<?php

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

use Puzzlout\Exceptions\Classes\Core\RuntimeException;
use Puzzlout\Exceptions\Codes\GeneralErrors;

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/FrameworkMvc
 * @since Version 1.0.0
 * @package RequestBase
 */
class RequestBase {

    const APP_NAME = 0;

    /**
     * The definition of the inputs in an array as follows:
     * <code>
     *      var inputs = [
     *          APP_NAME => "value_appname",
     *          INPUT_POST => "value_post",
     *          INPUT_GET => "value_get",
     *          INPUT_SESSION => "value_session",
     *          INPUT_COOKIE => "value_cookie",
     *          INPUT_FILES => "value_files",
     *          INPUT_SERVER => "value_server",
     *          INPUT_ENV => "value_environment"
     *      ];
     * </code>
     * @var array 
     */
    protected $Inputs;

    /**
     * The Application name that is computed:
     *      - from parameters $inputs passed to the constructor
     *  or
     *      - from the url 
     * 
     * In any case, if both values are found, they must match.
     * 
     * @var string 
     */
    public $AppName;

    /**
     * The Url is computed from the values found in $ServerContext->Server. See the gist to know how.
     * @var string 
     * @see https://gist.github.com/pwenzel/4567675
     * @see https://prateekvjoshi.com/2014/02/22/url-vs-uri-vs-urn/ for the definition of Uri vs Url vs Urn
     */
    public $Url;

    /**
     * The HTTP verb found in $ServerContext->Server['REQUEST_METHOD']
     * @var string 
     */
    public $HttpVerb;

    /**
     * The instance of ServerContext
     * @var Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext
     */
    public $ServerContext;

    /**
     * The instance of ClientContext
     * @var Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext
     */
    public $ClientContext;

    /**
     * The constructor initializing the ServerContext and ClientContext with the data found in the parameter $inputs.
     * @param array $inputs The request inputs
     */
    public function __construct($inputs) {
        $this->Inputs = $inputs;
        $this->ServerContext = ServerContext::init($inputs)->fill();
        $this->ClientContext = ClientContext::init($inputs)->fill();
    }

    /**
     * Initialize the class to chain method calls.
     * @param array $inputs The request inputs
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase
     */
    public static function init($inputs) {
        $instance = new RequestBase($inputs);
        return $instance;
    }

    public static function rootDir() {
        return dirname(dirname(__FILE__));
    }
    
    /**
     * Getter of property AppName
     * @return string
     */
    public function appName() {
        return $this->AppName;
    }
    
    /**
     * Setter of property AppName. Looks first in $Inputs property and then $ServerContext.
     * @throws RuntimeException When $_SERVER["REQUEST_URI"] is not set and Inputs[self::APP_NAME] is not set.
     * @todo update the error codes in the exceptions.
     */
    public function setAppName() {
        if (isset($this->Inputs[self::APP_NAME])) {
            $this->AppName = $this->Inputs[self::APP_NAME];
        }
        
        $requestUri = $this->ServerContext->getValueFor(ServerContext::INPUT_SERVER, 'REQUEST_URI');
        if(empty($requestUri)) {
            $errMsg = '$_SERVER["REQUEST_URI"] is not set.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }
        $uriParts = explode('/', $requestUri);
        
        //Validate that the application path exists!
        $this->AppName = $uriParts[0];
        $appPath = self::rootDir() . $this->AppName . '/';
        if(!is_dir($appPath)) {
            $errMsg = '$appPath is not a valid directory. Given: ' . $appPath;
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }
    }

    public function setUrl() {
        $https = $this->ServerContext->getValueFor(ServerContext::INPUT_SERVER, 'HTTPS');
        $isHttpsOn = ($https === "on");
        $httpHost = $this->ServerContext->getValueFor(ServerContext::INPUT_SERVER, 'HTTP_HOST');
        $requestUri = $this->ServerContext->getValueFor(ServerContext::INPUT_SERVER, 'REQUEST_URI');
        
        if(empty($httpHost) || empty($requestUri)) {
            $errMsg = '$_SERVER["HTTP_HOST"] and $_SERVER["REQUEST_URI"] are not both set.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }
        
        $protocol = ((!empty($httpHost) && $isHttpsOn) ? "https" : "http");
        $completeUrl = $protocol . "://" . $httpHost . $requestUri;
        
        if(!filter_var($complete_url, FILTER_VALIDATE_URL)) {
            $errMsg = 'The url is not valid. Computed Url is: ' . $completeUrl;
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }

        return $completeUrl;
    }

}
