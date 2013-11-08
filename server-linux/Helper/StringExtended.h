#pragma once
#include<string>
#include<vector>
#include <sstream>
namespace Helper {

    class StringExtended {
    private:

        static std::vector<std::string> &split(const std::string &s, char delim, std::vector<std::string> &elems);

    public:

        static std::vector<std::string> split(const std::string &s, char delim); 

    };


}
