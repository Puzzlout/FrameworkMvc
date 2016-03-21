<?php

/**
 * InputPost is responsible for reading and validating the data in php://input before storing it in the request context.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package InputPost
 */

namespace Puzzlout\FrameworkMvc\System\Web;

class PostDataParser implements InputParserInterface{

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
     * @return \Puzzlout\FrameworkMvc\System\Web\PostDataParser
     */
    public function init() {
        $instance = new PostDataParser();
        return $instance;
    }
    
    /**
     * Reads php://input to retrieve the data and extract the associative array.
     * @return \Puzzlout\FrameworkMvc\System\Web\PostDataParser
     */
    public function fill() {
        if (file_get_contents('php://input') == "") {
            return $this;
        }
        $jsonDecodedData = json_decode(file_get_contents('php://input'));
        if (is_null($jsonDecodedData)) {
            return $this;
        }
        $postData = get_object_vars($jsonDecodedData);
        if (empty($postData)) {
            return $this;
        }
        $this->output = $postData;
        return $this;
    }
    
    /**
     * Validates the data to return to the request context. After that, the data is not be modified.
     */
    public function validateData() {
        
    }
}
