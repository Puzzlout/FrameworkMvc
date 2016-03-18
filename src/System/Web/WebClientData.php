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
     * Find the property in the class based on the input type given.
     * ex: 
     *  - INPUT_POST will match $InputPost
     *  - INPUT_GET will match $InputGet
     *  - INPUT_COOKIE will match $Cookies
     * @param int $inputType
     * @return string The searched property in the current class.
     * @throws InvalidArgumentException When $inputType is not INPUT_SERVER or INPUT_ENV
     * @todo use scarlar type hinting for $inputType.
     * @todo use return type hinting.
     */
    private function findTargetProperty($inputType) {
        
    }


}
