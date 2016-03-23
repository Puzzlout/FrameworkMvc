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

    const INPUT_SERVER = 6;
    const INPUT_ENV = 7;
    /**
     * The definition of the inputs in an array as follows:
     * <code>
     *      var inputs = [
     *          INPUT_POST => "value_post",
     *          INPUT_GET => "value_get",
     *          INPUT_SESSION => "value_session",
     *          INPUT_COOKIE => "value_cookie",
     *          INPUT_FILES => "value_files",
     *      ];
     * </code>
     * @var array 
     */
    protected $Inputs;

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
     * @param array $inputs The definition of the inputs.
     */
    public function __construct($inputs) {
        $this->Inputs = $inputs;
        $this->Server = [];
        $this->Environment = [];
    }

    /**
     * Create an object of the class.
     * @param array $inputs The definition of the inputs.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext The instance of class
     */
    public static function init($inputs) {
        $instance = new ServerContext($inputs);
        return $instance;
    }

    /**
     * Validates that all the expected inputs have a definition, even if it is null or empty.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext
     * @throws InvalidArgumentException When 1 or several inputs are not defined in the inputs given.
     */
    public function validate() {
        if (!isset($this->Inputs[self::INPUT_SERVER])) {
            $errorMsg = 
                'Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext::INPUT_SERVER ' . 
                'key must be set in inputs array.';
            throw new InvalidArgumentException($errorMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        if (!isset($this->Inputs[self::INPUT_ENV])) {
            $errorMsg = 
                'Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext::INPUT_ENV ' . 
                'key must be set in inputs array.';
            throw new InvalidArgumentException($errorMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        return $this;
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
        $this->Server = InputParser::init()->parse($this->Inputs[self::INPUT_SERVER]);
        $this->Environment = InputParser::init()->parse($this->Inputs[self::INPUT_ENV]);
        return $this;
    }
}
