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
     * The instance of PostDataParser returns the array parsed and cleaned.
     * @var Puzzlout\FrameworkMvc\System\Web\PostDataParser 
     * @see http://php.net/manual/fr/reserved.variables.post.php
     */
    protected $InputPost;

    /**
     * The instance of GetDataParser returns the array parsed and cleaned.
     * @var Puzzlout\FrameworkMvc\System\Web\GetDataParser 
     * @see http://php.net/manual/fr/reserved.variables.get.php
     */
    protected $InputGet;

    /**
     * The instance of UploadedFileParser returns the array parsed and cleaned.
     * @var Puzzlout\FrameworkMvc\System\Web\UploadedFileParser 
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
     * @var Puzzlout\FrameworkMvc\System\Web\SessionParser 
     * @see http://php.net/manual/fr/reserved.variables.session.php
     */
    protected $InputSession;

    /**
     * Constructor: initialize the properties to their default.
     */
    public function __construct() {
        $this->InputPost = PostDataParser::init()->parse();
        //$this->InputGet = InputGet::init()->fill();
        //$this->Files = UploadedFiles::init()->fill();
        //$this->Cookies = Cookies::init()->fill();
        //$this->Session = InputSession::init()->fill();
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

}
