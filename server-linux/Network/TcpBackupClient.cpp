
#include "TcpBackupClient.h"

TcpBackupClient::TcpBackupClient(unsigned int file_id,
            Interface::CurrentBaseOperation::ICurrentBaseOperationEditor* editor) {
    editorProvader = editor;
    this->file_id = file_id;
}

void TcpBackupClient::generateAndSetDataInRedis() {
    boost::uuids::uuid uuid = boost::uuids::random_generator()(); // тут не опечатка!
    std::string str_unique = boost::lexical_cast<std::string> (uuid); 
    Helper::Crypto crypto(str_unique);
    unsigned char* hash = crypto.getHashSha512();
    std::string token = crypto.sha512ToString(hash);
    
    
}

TcpBackupClient::~TcpBackupClient() {
}

