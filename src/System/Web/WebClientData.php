<?php

/**
 * The class stores the $_GET, $_POST, $_SESSION, $_COOKIES and $_FILES arrays data.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package WebClientData
 */

namespace Puzzlout\FrameworkMvc\System\Web;

use Puzzlout\Exceptions\Classes\Core\InvalidArgumentException;
use Puzzlout\Exceptions\Codes\LogicErrors;

class WebClientData {

    /**
     * The list of key/value pair found in $_POST.
     * @var array 
     * @see http://php.net/manual/fr/reserved.variables.post.php
     */
    protected $InputPost;

    /**
     * The list of key/value pair found in $_GET.
     * @var array 
     * @see http://php.net/manual/fr/reserved.variables.get.php
     */
    protected $InputGet;

    /**
     * The list of key/value pair found in $_FILES.
     * @var array 
     * @see http://php.net/manual/fr/reserved.variables.files.php
     */
    protected $Files;

    /**
     * The list of key/value pair found in $_COOKIE.
     * @var array 
     * @see http://php.net/manual/fr/reserved.variables.cookies.php
     */
    protected $Cookies;

    /**
     * The list of key/value pair found in $_SESSION.
     * @var array 
     * @see http://php.net/manual/fr/reserved.variables.session.php
     */
    protected $Session;

    /**
     * Constructor: initialize the properties to their default.
     */
    public function __construct() {
        $this->InputPost = [];
        $this->InputGet = [];
        $this->Files = [];
        $this->Cookies = [];
        $this->Session = [];
    }

    /**
     * Create an object of the class.
     * @return \Puzzlout\FrameworkMvc\System\Web\WebClientData The instance of class
     */
    public static function init() {
        $instance = new WebClientData();
        return $instance;
    }

    /**
     * Gets the property InputPost.
     * @return array
     * @todo use return type hinting.
     */
    public function InputPost() {
        return $this->InputPost;
    }

    /**
     * Gets the property InputGet.
     * @return array
     * @todo use return type hinting.
     */
    public function InputGet() {
        return $this->InputPost;
    }

    /**
     * Gets the property Files.
     * @return array
     * @todo use return type hinting.
     */
    public function Files() {
        return $this->Files;
    }

    /**
     * Gets the property Cookies.
     * @return array
     * @todo use return type hinting.
     */
    public function Cookies() {
        return $this->Cookies;
    }

    /**
     * Gets the property Session.
     * @return array
     * @todo use return type hinting.
     */
    public function Session() {
        return $this->Session;
    }
    
    /**
     * Fill the computed property from the input type with the result of filter_input_array function.
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
    
    public function fillFiles() {
        $this->Files = $_FILES;
        return $this;
    }
    
    /**
     * @see https://gist.github.com/voku/7c995ed2e19d78a164e2#file-input_filter-php-L176
     */
    public function fillSession() {
        $this->Files = $_SESSION;
        return $this;
    }

    /**
     * Find the property in the class based on the input type given.
     * ex: 
     *  - INPUT_POST will match $InputPost
     *  - INPUT_GET will match $InputGet
     *  - INPUT_COOKIE will match $Cookies
     * @todo use scarlar type hinting for $inputType.
     * @todo use return type hinting.
     */
    private function findTargetProperty($inputType) {
        $property = "";
        switch ($inputType) {
            case INPUT_POST:
                $property = "InputPost";
                break;
            case INPUT_GET:
                $property = "InputGet";
                break;
            case INPUT_COOKIE:
                $property = "Cookies";
                break;
            default:
                $errMsg = '$inputType of value ' .
                        $inputType .
                        ' is not supported here. Supported: ' .
                        INPUT_POST . ' (INPUT_POST), ' .
                        INPUT_GET . ' (INPUT_GET) and';
                        INPUT_COOKIE . ' (INPUT_COOKIE).';
                throw new InvalidArgumentException($errMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        return $property;
    }


}
