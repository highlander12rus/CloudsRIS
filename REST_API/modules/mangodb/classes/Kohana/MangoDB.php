<?php

/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * Wouter Wiegmans wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return - Wouter Wiegmans
 * ----------------------------------------------------------------------------
 */

class Kohana_MangoDB {

    /**
     * @var  string  default instance name
     */
    public static $default = 'default';

    /**
     * @var  array  Database instances
     */
    public static $instances = array();

    /**
     * Get a singleton MangoDB instance. If configuration is not specified,
     * it will be loaded from the MangoDB configuration file using the same
     * group as the name.
     *
     *     // Load the default database
     *     $db = MangoDB::instance();
     *
     *     // Create a custom configured instance
     *     $db = MangoDB::instance('custom', $config);
     *
     * @param   string   instance name
     * @param   array    configuration parameters
     * @return  Database
     */
    public static function instance($name = NULL, array $config = NULL) {
        if ($name === NULL) {
            // Use the default instance name
            $name = MangoDB::$default;
        }

        if (!isset(MangoDB::$instances[$name])) {
            if ($config === NULL) {
                // Load the configuration for this database
                $config = Kohana::$config->load('mangoDB.' . $name);
            }

            // Store the database instance
            MangoDB::$instances[$name] = new MangoDB($name, $config);
        }

        return self::$instances[$name];
    }

    // Instance name
    protected $_name;
    // Connected
    protected $_connected;
    // Mongo object
    protected $_connection;
    // MongoDB object
    protected $_db;
    // Configuration
    protected $_config;
    
    protected $_collections;

    protected function __construct($name, array $config) {
        $this->_name = $name;
        $this->_config = $config;

        $server = $this->_config['connection']['hostnames'];
        $options = Arr::get($this->_config['connection'], 'options', array());

        if (strpos($server, 'mongodb://') !== 0) {
            // Add 'mongodb://'
            $server = 'mongodb://' . $server;
        }

        // create Mongo object (but don't connect just yet)
        $this->_connection = new MongoClient($server, array('connect' => FALSE) + $options);
        $this->_db = $this->_connection->selectDB($this->_config['connection']['options']['db']);
    }

    public function getDb($collectionName) {
        if (isset($this->_collections[$collectionName])) {
            return $this->_collections[$collectionName];
        } else {
            $this->_collections[$collectionName] = new MongoCollection($this->_db, $collectionName);
            return  $this->_collections[$collectionName];
        }
    }

    final public function __toString() {
        return $this->_name;
    }

}
