<?php

namespace src\models;

use mysql_xdevapi\Exception;
use PDO;
use PDOException;

/**
 * Class DB - common class for database connection.
 *
 * @package src\models
 */
class DB
{
    /**
     * Path to database configuration file.
     */
    const CONFIG_FILE = '../config/db.php';
    /**
     * @var string
     */
    public $host;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $password;

    /**
     * @var null|PDO
     */
    public $connection = null;

    /**
     * DB constructor. Sets up class'es field configuration. Throws exception if it not found.
     */
    public function __construct()
    {
        $config = require_once self::CONFIG_FILE;

        if (empty($config)) {
            throw new Exception('Database configuration was not found.');
        }

        if (!isset($config['host']) || !isset($config['user']) || !isset($config['name']) || !isset($config['password'])) {
            throw new Exception('Some configuration database is not set.');
        }

        $this->host = $config['host'];
        $this->user = $config['user'];
        $this->name = $config['name'];
        $this->password = $config['password'];
    }

    /**
     * Creates PDO connection.
     *
     * @return PDO|null
     */
    public function getConnection()
    {
        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->name, $this->user, $this->password);
            $this->connection->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->connection;
    }
}