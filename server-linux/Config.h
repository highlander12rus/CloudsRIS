#ifndef CONFIG_H
#define	CONFIG_H

#include <string>

#include <boost/property_tree/ptree.hpp>
#include <boost/property_tree/ini_parser.hpp>

using namespace std;

/**
 * singleton class
 */
class Config {
public:

    //access to options:
    //std::cout << pt.get<std::string>("Section1.Value1") << std::endl;
    //std::cout << pt.get<std::string>("Section1.Value2") << std::endl;
    static Config& Instance();
    
    
    /**
     * Поулчение опции
     * @param option_name имя опции которое поулчить из ini файла, например Databases.port
     * @return тип в котором вернуть это значение
     */
    template <typename T>
    T getProperty(string option_name) {
        return pt.get<T>(option_name);
    }
    
    ~Config();

private:
    
    boost::property_tree::ptree pt; 
    
    Config();
    Config(const Config&);
    Config& operator=(const Config&);
};

#endif	/* CONFIG_H */

