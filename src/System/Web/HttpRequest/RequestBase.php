<?php

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;
use Puzzlout\Exceptions\Classes\Core\RuntimeException;
use Puzzlout\Exceptions\Classes\NotImplementedException;
use Puzzlout\Exceptions\Codes\GeneralErrors;
use Puzzlout\FrameworkMvc\Commons\UrlExtensions;

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

    const APP_NAME = "APP_NAME";

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

    /**
     * Getter of property AppName
     * @return string
     */
    public function appName() {
        return $this->AppName;
    }

    /**
     * Getter of property Url
     * @return string
     */
    public function url() {
        return $this->Url;
    }

    /**
     * Getter of property HttpVerb
     * @return string
     */
    public function httpVerb() {
        return $this->HttpVerb;
    }

    /**
     * Setter of property AppName. Looks first in $Inputs property and then $ServerContext.
     * 
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase
     * @throws RuntimeException When $_SERVER["REQUEST_URI"] is not set and Inputs[self::APP_NAME] is not set.
     * @todo update the error codes in the exceptions.
     */
    public function setAppName() {
        $requestUri = $this->ServerContext->getValueFor(ServerContext::INPUT_SERVER, ServerConst::REQUEST_URI);
        $uriParts = explode('/', $requestUri);
        if (count($uriParts) >= 2) {
            $this->AppName = $uriParts[1];
            return;
        }
        if (isset($this->Inputs[self::APP_NAME]) && !empty($this->Inputs[self::APP_NAME])) {
            $this->AppName = $this->Inputs[self::APP_NAME];
            return;
        }

        $this->AppName = null;
        if (is_null($this->AppName)) {
            $errMsg = '$_SERVER[REQUEST_URI] and $this->Inputs[RequestBase::APP_NAME] are not set! At least one must ' .
                    'be set to work.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }
        return $this;
    }

    /**
     * 
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase
     * @throws RuntimeException When $_SERVER["REQUEST_URI"] and $_SERVER["HTTP_HOST"] are not set or that the computed
     * complete URL is not valid.
     * @todo update the error codes in the exceptions.
     */
    public function setUrl() {
        $https = $this->ServerContext->getValueFor(ServerContext::INPUT_SERVER, ServerConst::HTTPS);
        $isHttpsOn = ($https === "on");
        $httpHost = $this->ServerContext->getValueFor(ServerContext::INPUT_SERVER, ServerConst::HTTP_HOST);
        $requestUri = $this->ServerContext->getValueFor(ServerContext::INPUT_SERVER, ServerConst::REQUEST_URI);

        if (empty($httpHost) || empty($requestUri)) {
            $errMsg = '$_SERVER["HTTP_HOST"] and $_SERVER["REQUEST_URI"] are not both set.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }

        $protocol = ((!empty($httpHost) && $isHttpsOn) ? "https" : "http");
        $completeUrl = $protocol . "://" . $httpHost . $requestUri;

        if (!UrlExtensions::init()->validate($completeUrl)) {
            $errMsg = 'The url is not valid. Computed Url is: ' . $completeUrl;
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }
        $this->Url = $completeUrl;
        return $this;
    }

    public function setHttVerb() {
        $requestMethod = $this->ServerContext->getValueFor(ServerContext::INPUT_SERVER, ServerConst::REQUEST_METHOD);
        if (empty($requestMethod)) {
            $errMsg = '$_SERVER["REQUEST_METHOD"] cannot be empty.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }

        switch ($requestMethod) {
            case "GET":
            case "POST":
            case "HEAD":
            case "PUT":
                $this->HttpVerb = $requestMethod;
                break;
            default :
                $errMsg = '$_SERVER["REQUEST_METHOD"] value is not valid or implemented. Given: ' . $requestMethod;
                throw new NotImplementedException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }

        return $this;
    }

}
