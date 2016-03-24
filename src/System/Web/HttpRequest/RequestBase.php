<?php

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

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

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

    public function setAppName(ServerContext $serverContext) {
        $this->AppName = $appName;
    }

    public function setUrl(ServerContext $serverContext) {
        $protocol = ((isset($serverContext->server()['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'];
        $complete_url = $base_url . $_SERVER["REQUEST_URI"];

        return $complete_url;
    }

}
