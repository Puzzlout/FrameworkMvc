<?php

/**
 * The class stores the $_GET, $_POST, $_SESSION, $_COOKIES and $_FILES arrays data.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package WebClientData
 */

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

use Puzzlout\Exceptions\Classes\Core\InvalidArgumentException;
use Puzzlout\Exceptions\Codes\LogicErrors;

class WebClientData {

    const INPUT_POST = 1;
    const INPUT_GET = 2;
    const INPUT_SESSION = 3;
    const INPUT_COOKIE = 4;
    const INPUT_FILES = 5;

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
     * The instance of PostDataParser returns the array parsed and cleaned.
     * @var Puzzlout\FrameworkMvc\System\Web\HttpRequest\PostDataParser 
     * @see http://php.net/manual/fr/reserved.variables.post.php
     */
    protected $InputPost;

    /**
     * The instance of GetDataParser returns the array parsed and cleaned.
     * @var Puzzlout\FrameworkMvc\System\Web\HttpRequest\GetDataParser 
     * @see http://php.net/manual/fr/reserved.variables.get.php
     */
    protected $InputGet;

    /**
     * The instance of UploadedFileParser returns the array parsed and cleaned.
     * @var Puzzlout\FrameworkMvc\System\Web\HttpRequest\UploadedFileParser 
     * @see http://php.net/manual/fr/reserved.variables.files.php
     */
    protected $Files;

    /**
     * The instance of CookieParser returns the array parsed and cleaned.
     * @var array 
     * @see http://php.net/manual/fr/reserved.variables.cookies.php
     */
    protected $Cookies;

    /**
     * The instance of SessionParser.
     * @var Puzzlout\FrameworkMvc\System\Web\HttpRequest\SessionParser 
     * @see http://php.net/manual/fr/reserved.variables.session.php
     */
    protected $InputSession;

    /**
     * Constructor: initialize the properties to their default.
     * @param array $inputs The definition of the inputs.
     */
    public function __construct($inputs) {
        $this->Inputs = $inputs;
        $this->InputPost = [];
        $this->InputGet = [];
        $this->Cookies = [];
        $this->InputSession = [];
        $this->Files = [];
    }

    /**
     * Create an object of the class.
     * @param array $inputs The definition of the inputs.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\WebClientData The instance of class
     */
    public static function init($inputs) {
        $instance = new WebClientData($inputs);
        return $instance;
    }

    /**
     * Validates that all the expected inputs have a definition, even if it is null or empty.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\WebClientData
     * @throws InvalidArgumentException When 1 or several inputs are not defined in the inputs given.
     */
    public function validate() {
        if (!isset($this->Inputs[self::INPUT_POST])) {
            $errorMsg = 'Puzzlout\FrameworkMvc\System\Web\HttpRequest::INPUT_POST key must be set in inputs array.';
            throw new InvalidArgumentException($errorMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        if (!isset($this->Inputs[self::INPUT_GET])) {
            $errorMsg = 'Puzzlout\FrameworkMvc\System\Web\HttpRequest::INPUT_GET key must be set in inputs array.';
            throw new InvalidArgumentException($errorMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        if (!isset($this->Inputs[self::INPUT_SESSION])) {
            $errorMsg = 'Puzzlout\FrameworkMvc\System\Web\HttpRequest::INPUT_SESSION key must be set in inputs array.';
            throw new InvalidArgumentException($errorMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        if (!isset($this->Inputs[self::INPUT_COOKIE])) {
            $errorMsg = 'Puzzlout\FrameworkMvc\System\Web\HttpRequest::INPUT_COOKIE key must be set in inputs array.';
            throw new InvalidArgumentException($errorMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        if (!isset($this->Inputs[self::INPUT_FILES])) {
            $errorMsg = 'Puzzlout\FrameworkMvc\System\Web\HttpRequest::INPUT_FILES key must be set in inputs array.';
            throw new InvalidArgumentException($errorMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        return $this;
    }

    /**
     * Gets the property InputPost.
     * @return array
     * @todo use return type hinting.
     */
    public function inputPost() {
        return $this->InputPost;
    }

    /**
     * Gets the property InputGet.
     * @return array
     * @todo use return type hinting.
     */
    public function inputGet() {
        return $this->InputPost;
    }

    /**
     * Gets the property Files.
     * @return array
     * @todo use return type hinting.
     */
    public function files() {
        return $this->Files;
    }

    /**
     * Gets the property Cookies.
     * @return array
     * @todo use return type hinting.
     */
    public function cookies() {
        return $this->Cookies;
    }

    /**
     * Gets the property InputSession.
     * @return array
     * @todo use return type hinting.
     */
    public function inputSession() {
        return $this->InputSession;
    }

    /**
     * 
     * @param array $inputs
     */
    public function fill() {
        $this->validate();
        $this->InputPost = PostDataParser::init()->parse($this->Inputs[self::INPUT_POST]);
        $this->InputGet = InputParser::init()->parse($this->Inputs[self::INPUT_GET]);
        $this->Files = InputParser::init()->parse($this->Inputs[self::INPUT_FILES]);
        $this->Cookies = InputParser::init()->parse($this->Inputs[self::INPUT_COOKIE]);
        $this->Session = InputParser::init()->parse($this->Inputs[self::INPUT_SESSION]);
    }

}
