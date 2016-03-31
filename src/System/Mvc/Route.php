<?php

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;

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

    const StartIndexNoVirtualPath = 1;
    const StartIndexWithVirtualPath = 2;

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
        $this->setUriToLower();
        $urlParts = explode("/", $this->Uri);

        $baseUrl = "/";
        $baseUrlConstainsVirtualPath = !(strcasecmp("/", $baseUrl) === 0);
        $startIndex = $baseUrlConstainsVirtualPath ? self::StartIndexWithVirtualPath : self::StartIndexNoVirtualPath;

        if (array_key_exists($startIndex, $urlParts) && array_key_exists($startIndex + 1, $urlParts)) {
            $this->setModule($urlParts[$startIndex]);
            $this->setAction($urlParts[$startIndex + 1]);
        } else {
            throw new \Puzzlout\Exceptions\Classes\NotImplementedException("Code to be done here", 0, null);
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

    protected function setUriToLower($rawUri) {
        $this->Uri = strtolower($rawUri);
    }
    
    public function controller() {
        return $this->Controller;
    }

    public function setAction($action) {
        if (empty($action)) {
            throw new \Exception("Action cannot be empty", 0, null); //todo: create error code
        } else if (!is_string($action)) {
            throw new \Exception("Action must be a string", 0, null); //todo: create error code
        } else {
            $this->action = $action;
        }
    }

    public function setModule($module) {
        if (empty($module)) {
            throw new \Exception("Module cannot be empty", 0, null); //todo: create error code
        } else if (!is_string($module)) {
            throw new \Exception("Module must be a string", 0, null); //todo: create error code
        } else {
            $this->module = $module;
        }
    }

}
