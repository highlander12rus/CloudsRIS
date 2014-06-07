#pragma once
#include <string>
#include <boost/filesystem.hpp> 
#include <boost/log/trivial.hpp>

using namespace std;


namespace Helper {

    class FileSystem {

    public:
        static uint_64 getFreeSpace(string path) {
            uint_64 freeSpaceL = 0;
            //опредяем свободынй размер

            boost::filesystem::path p(path);
            try {
                boost::filesystem::space_info s = boost::filesystem::space(p);
                freeSpaceL = s.free;
            } catch (boost::filesystem::filesystem_error &e) {
                BOOST_LOG_TRIVIAL(error) << e.what();
            }

            return freeSpaceL;

        }
    };
}


