
#include "TcpBackupClient.h"

TcpBackupClient::TcpBackupClient(unsigned int file_id,
        IBaseEditor* editor, Connection* connect) {
    editorProvader = editor;
    this->file_id = file_id;
    conn = connect;

    Database::Tables::ServerFiles serverFilesTablet(conn);
    result_db = serverFilesTablet.getByFileId(file_id);
}

std::string TcpBackupClient::generateAndSetDataInRedis(unsigned int length, unsigned int order, unsigned int offset) {
    boost::uuids::uuid uuid = boost::uuids::random_generator()(); // тут не опечатка!
    std::string str_unique = boost::lexical_cast<std::string> (uuid);
    Helper::Crypto crypto(str_unique);
    unsigned char* hash = crypto.getHashSha512();
    std::string token = crypto.sha512ToString(hash);

    std::stringstream ss;
    ss << "s " << length << " " << file_id << " " << order << " " << offset;
    editorProvader->set(token, ss.str());
    delete hash;
    return token;
}

void TcpBackupClient::start() {
    BOOST_LOG_TRIVIAL(debug) << "Start tcp client";
    unsigned int count_bloks = result_db->rowsCount();
    if (count_bloks > 1) {
        BOOST_LOG_TRIVIAL(debug) << "tcp client: start backup many blocks";
        //donload many blokcs if size file size > BLOCK_SIZE
        searchAndDownloads();
    } else {
        BOOST_LOG_TRIVIAL(debug) << "tcp client: single block ";
        download_single_block();

    }

}

void TcpBackupClient::download_single_block() {
    result_db->next();
    //Проверяем есть ли ip адрессов
    Database::Tables::AddressBlocks addres_block(conn);
    unsigned int block_id = result_db->getUInt(5);

    if (addres_block.countIssetOtherServers(block_id, SELF_IP) > 1) {
        ResultSet* result_ip = addres_block.getOtherServerForBlock(SELF_IP, block_id);
        while (result_ip->next()) {
            unsigned int fileSize = result_db->getUInt(4);
            unsigned int order = result_db->getUInt(6);
            unsigned int offset = result_db->getUInt(3);
            std::string pathToblock = result_db->getString(12);
            std::string ip = result_ip->getString(2);
            if (downloadBlock(pathToblock, fileSize, order, offset, ip)) {
                BOOST_LOG_TRIVIAL(debug) << "download_single_block: block file was send to ip=" << ip;
            } else {
                BOOST_LOG_TRIVIAL(error) << "download_single_block: ошибка загрузка файла на серввак ip"
                        << ip;
                result_db->previous();

            }
        }
        delete result_ip;

    } else {
        BOOST_LOG_TRIVIAL(debug) << "tcp client: сервера не найдены ищем свободыне :(";
        //на дургих сервак нету ищем куда вылить
        result_db->previous();
        searchAndDownloads();
    }
}

void TcpBackupClient::searchAndDownloads() {
    while (result_db->next()) {
        unsigned int fileSize = result_db->getUInt(4);
        unsigned int order = result_db->getUInt(6);
        unsigned int offset = result_db->getUInt(3);
        std::string pathToblock = result_db->getString(12);

        Network::SearchServer search(fileSize, SELF_IP);
        search.search();
        vector<Network::ServersResponce> responce = search.getServers();
        int countBackeuped = 0;


        for (vector<Network::ServersResponce>::iterator it = responce.begin();
                it != responce.end() || countBackeuped < COUNT_SERVER_BACKUP; it++, countBackeuped++) {
            BOOST_LOG_TRIVIAL(debug) << "tcp client: start загрузка на сервер ip=" << (*it).ip;
            if (downloadBlock(pathToblock, fileSize, order, offset, (*it).ip)) {
                BOOST_LOG_TRIVIAL(debug) << "block file was send to ip=" << (*it).ip;
            } else {
                BOOST_LOG_TRIVIAL(error) << "ошибка загрузка файла на серввак ip"
                        << (*it).ip;
                countBackeuped--;
                result_db->previous();

            }
            BOOST_LOG_TRIVIAL(debug) << "tcp client: stop загрузка на сервер ip=" << (*it).ip;

        }
    }

}

bool TcpBackupClient::downloadBlock(std::string pathToBlock, unsigned int length,
        unsigned int order, unsigned int offset, std::string ip) {
    BOOST_LOG_TRIVIAL(debug) << "tcp client: загружается блок с length=" << length
            << " ofsset=" << offset << " order=" << order << " ip=" << ip;
    boost::asio::io_service io_service;
    boost::asio::ip::tcp::endpoint tcp_server(boost::asio::ip::address::from_string(ip), TCP_PORT_SERVER);
    tcp::socket socket(io_service);
    socket.connect(tcp_server);

    std::string token = generateAndSetDataInRedis(length, order, offset);

    SendHeadersClientTcp header;
    //@todo: this shit- fix
    for (int i = 0; i < 128; i++) {
        header.token[i] = token.c_str()[i];
    }

    header.file_size = length;
    if (sizeof (SendHeadersClientTcp) != HEADER_TCP_LENGTH)
        BOOST_LOG_TRIVIAL(error) << "sizeof(SendHeadersClientTcp) != HEADER_TCP_LENGTH";

    char* buffer_headers = (char*) (&header);
    socket.write_some(boost::asio::buffer(buffer_headers, HEADER_TCP_LENGTH));

    char* buf = new char[BUFFER_SIZE];
    while (1) {
        FileSystem::Block::Block block(pathToBlock, 0);
        FileSystem::StreamRead* sread = block.readFile(offset, length);
        int was_read = sread->read(buf, BUFFER_SIZE);
        if (was_read == 0)
            break;
        size_t len_send = socket.write_some(boost::asio::buffer(buf, was_read));
        if (len_send != BUFFER_SIZE)
            BOOST_LOG_TRIVIAL(error) << "колчиество отправленных не равно буферу";

    }
    char* buf_responce = new char;
    char res__buf;
    size_t len = socket.read_some(boost::asio::buffer(buf_responce, 1));
    res__buf = *buf_responce;
    delete buf, buf_responce;

    return TCP_SOCKET_OK != res__buf;

}

TcpBackupClient::~TcpBackupClient() {
    if (result_db != NULL) {
        delete result_db;
    }
}

