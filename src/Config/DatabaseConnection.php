<?php

/**
 * Stores the info about the details to connect to the database.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package DatabaseConnection
 */

namespace Puzzlout\FrameworkMvc\Config;

class DatabaseConnection {

    const HOST = "HOST";
    const USERNAME = "USERNAME";
    const PORT = "PORT";
    const DATABASE_NAME = "DATABASE_NAME";
    const PASSWORD = "PASSWORD";

    private $Driver;

    public function __construct($driver) {
        $this->Driver = $driver;
    }

    public function init($driver) {
        $instance = new DatabaseConnection($driver);
        return $instance;
    }

    public function pdo() {
        return [
            self::HOST => "localhost",
            self::USERNAME => "webdev_jl",
            self::PASSWORD => "",
            self::DATABASE_NAME => "easymvc",
            self::PORT => "3006"
        ];
    }

}
