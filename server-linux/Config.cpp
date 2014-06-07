#include "Config.h"

Config& Config::Instance() {
    static Config theSingleInstance;

    return theSingleInstance;
}

Config::Config() {
    
    boost::property_tree::ini_parser::read_ini("config.ini", pt);
}

Config::Config(const Config& orig) {
}

Config::~Config() {
}

