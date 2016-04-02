<?php

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;
use Puzzlout\Exceptions\Classes\Core\RuntimeException;
use Puzzlout\Exceptions\Codes\GeneralErrors;
use Puzzlout\FrameworkMvc\Commons\Validation\StringValidator;

/**
 * Route class
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package Route
 */
class Route {

    private $request;
    protected $Controller;
    protected $Action;
    protected $Uri;
    protected $DefaultUrl;

    const URI_PART_START_WITHOUT_APP_ALIAS = 0;
    const URI_PART_START_WITH_APP_ALIAS = 1;

    /**
     * The constructor taking a ServerContext object to retrieve the request URI.
     * 
     * @param \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext $serverContext
     */
    public function __construct(RequestBase $request) {
        $this->request = $request;
    }

    /**
     * Instantiate the class and return it to chain method calls.
     * 
     * @param \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext $serverContext
     * @return \Puzzlout\FrameworkMvc\System\Mvc\Route
     */
    public static function init(RequestBase $request) {
        $instance = new Route($request);
        return $instance;
    }

    /**
     * The possible URI values are:
     *      /controller/action
     *      /app_alias/controller/action
     *      
     * @throws \Puzzlout\Exceptions\Classes\NotImplementedException
     */
    public function fill() {
        $this->setUriToLower($this->request->serverContext());
        $uriContainsAppAlias = preg_match('`^*.['. $this->request->appAlias() .'].*$`', $this->Uri);
        $uriParts = explode("/", $this->Uri);
        $startIndex = 
                $uriContainsAppAlias ? 
                self::URI_PART_START_WITH_APP_ALIAS : 
                self::URI_PART_START_WITHOUT_APP_ALIAS;

        if (isset($uriParts[$startIndex]) && isset($uriParts[$startIndex + 1])) {
            $this->setController($uriParts[$startIndex]);
            $this->setAction($uriParts[$startIndex + 1]);
        } else {
            throw new \Puzzlout\Exceptions\Classes\NotImplementedException("Code to be done here when ", 0, null);
        }
    }

    /**
     * Gets url of the route.
     * @return string
     */
    public function uri() {
        return $this->Uri;
    }

    /**
     * Gets the default url.
     * @return string
     */
    public function defaultUrl() {
        return $this->DefaultUrl;
    }

    /**
     * Gets the action of the route.
     * @return string
     */
    public function action() {
        return $this->Action;
    }

    public function controller() {
        return $this->Controller;
    }

    protected function setUriToLower(ServerContext $serverContext) {
        $rawUri = $serverContext->getValueFor(ServerContext::INPUT_SERVER, ServerConst::REQUEST_URI);
        
        if(StringValidator::init($rawUri)->IsNullOrEmpty()) {
            $errMsg = '$_SERVER[REQUEST_URI] must not be null or empty.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }
        
        $this->Uri = strtolower($rawUri);
    }
    
    public function setAction($action) {
        if (empty($action)) {
            throw new \Exception("Action cannot be empty", 0, null); //todo: create error code
        } else if (!is_string($action)) {
            throw new \Exception("Action must be a string", 0, null); //todo: create error code
        } else {
            $this->Action = $action;
        }
    }

    public function setController($controller) {
        if (empty($controller)) {
            throw new \Exception("Module cannot be empty", 0, null); //todo: create error code
        } else if (!is_string($controller)) {
            throw new \Exception("Module must be a string", 0, null); //todo: create error code
        } else {
            $this->Controller = $controller;
        }
    }

}
