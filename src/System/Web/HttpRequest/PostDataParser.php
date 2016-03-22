<?php

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

use Puzzlout\Exceptions\Classes\Core\RuntimeException;
use Puzzlout\Exceptions\Classes\Core\InvalidArgumentException;
use Puzzlout\Exceptions\Codes\GeneralErrors;
use Puzzlout\Exceptions\Codes\LogicErrors;

/**
 * PostDataParser is responsible for reading and validating the data in php://input and returning it to the request 
 * context.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package PostDataParser
 */
class PostDataParser implements InputParserInterface {

    /**
     * The output will be an associative array.
     * @var array 
     */
    private $output;

    /**
     * The base constructor.
     */
    public function __construct() {
        $this->output = [];
    }

    /**
     * Static instanctiation for chained methods calls.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\PostDataParser
     */
    public static function init() {
        $instance = new PostDataParser();
        return $instance;
    }

    /**
     * Reads php://input to retrieve the data and extract the associative array.
     * @return array
     * @see http://php.net/manual/fr/function.json-decode.php
     * @see http://php.net/manual/en/function.get-object-vars.php
     */
    public function parse($input) {
        if (!($input === "php://input")) {
            throw new InvalidArgumentException(
            '$input parameter must be php://input', LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        
        if (file_get_contents($input) == "") {
            return $this->output;
        }

        $jsonDecodedData = json_decode(file_get_contents($input));
        if (is_null($jsonDecodedData)) {
            throw new RuntimeException(
            "data in $input is invalid." . var_dump($jsonDecodedData), GeneralErrors::INVALID_JSON_DATA, null);
        }

        $postData = get_object_vars($jsonDecodedData);
        if (empty($postData)) {
            return $this->output;
        }
        return $postData;
    }

}
