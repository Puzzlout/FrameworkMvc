<?php

/**
 * The class stores the $_SERVER and $_ENV arrays data.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package ServerContext
 */

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

use Puzzlout\Exceptions\Classes\Core\InvalidArgumentException;
use Puzzlout\Exceptions\Codes\LogicErrors;

class ServerContext {

    /**
     * The list of key/value pair found in $_SERVER.
     * @var array 
     * @see http://php.net/manual/fr/reserved.variables.server.php
     */
    protected $Server;

    /**
     * The list of key/value pair found in $_ENV.
     * @var array 
     * @see http://php.net/manual/fr/reserved.variables.env.php
     */
    protected $Environment;

    /**
     * Constructor: initialize the properties to their default.
     */
    public function __construct() {
        $this->Server = [];
        $this->Environment = [];
    }

    /**
     * Create an object of the class.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext The instance of class
     */
    public static function init() {
        $instance = new ServerContext();
        return $instance;
    }

    /**
     * Gets the property Server.
     * @return array
     * @todo use return type hinting.
     */
    public function server() {
        return $this->Server;
    }

    /**
     * Gets the property Environment.
     * @return array
     * @todo use return type hinting.
     */
    public function environment() {
        return $this->Environment;
    }
    
    public function fill() {
        $this->Server = InputParser::init()->parse($_SERVER);
        $this->Environment = InputParser::init()->parse($_ENV);
    }
}
