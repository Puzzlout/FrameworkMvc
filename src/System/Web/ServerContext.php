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

namespace Puzzlout\FrameworkMvc\System\Web;

use Puzzlout\Exceptions\Classes\Core\InvalidArgumentException;
use Puzzlout\Exceptions\Codes\LogicErrors;

class ServerContext {

    /**
     * The list of data item found in $_SERVER stored as key value pairs.
     * @var array of Puzzlout\Objects\Types\KeyValuePair
     */
    protected $Server;

    /**
     * The list of data item found in $_ENV stored as key value pairs.
     * @var array of Puzzlout\Objects\Types\KeyValuePair 
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
     * @return \Puzzlout\FrameworkMvc\System\Web\ServerContext The instance of class
     */
    public static function init() {
        $instance = new ServerContext();
        return $instance;
    }

    /**
     * Gets the property Server.
     * @return string
     * @todo use return type hinting.
     */
    public function Server() {
        return $this->Server;
    }

    /**
     * Gets the property Environment.
     * @return string
     * @todo use return type hinting.
     */
    public function Environment() {
        return $this->Environment;
    }

    /**
     * Fill the computed property from the input type with the result of filter_input_array function.
     * @param int $inputType
     * @return \Puzzlout\FrameworkMvc\System\Web\ServerContext
     * @throws InvalidArgumentException When $inputType is not an integer
     * @todo use scarlar type hinting for $inputType.
     * @todo use return type hinting.
     */
    public function fill($inputType) {
        if (!is_int($inputType)) {
            $errMsg = "inputType parameter must an integer value";
            throw new InvalidArgumentException($errMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        $arrayInput = filter_input_array($inputType);
        $property = $this->findTargetProperty($inputType);
        $this->$property = $arrayInput;
        return $this;
    }

    /**
     * Find the property in the class based on the input type given.
     * ex: 
     *  - INPUT_SERVER will match $Server
     *  - INPUT_ENV will match $Environment
     * @param int $inputType
     * @return string The searched property in the current class.
     * @throws InvalidArgumentException When $inputType is not INPUT_SERVER or INPUT_ENV
     * @todo use scarlar type hinting for $inputType.
     * @todo use return type hinting.
     */
    private function findTargetProperty($inputType) {
        $property = "";
        switch ($inputType) {
            case INPUT_SERVER:
                $property = "Server";
                break;
            case INPUT_ENV:
                $property = "Environment";
                break;
            default:
                $errMsg = '$inputType equals ' .
                        $inputType .
                        ' is not supported here. Supported: ' . INPUT_SERVER . ' (INPUT_SERVER) and ' . INPUT_ENV . ' (INPUT_ENV)';
                throw new InvalidArgumentException($errMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        return $property;
    }

}
