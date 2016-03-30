<?php

namespace Puzzlout\Framework\Core;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;

/**
 * Route class
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package Route
 */
class Route {

    protected $Controller;
    protected $Action;
    protected $Uri;
    protected $DefaultUrl;

    const StartIndexNoVirtualPath = 1;
    const StartIndexWithVirtualPath = 2;

    public function __construct(RequestBase $request) {
        $this->Url = $request->url();
    }

    /**
     * Sets the url, module and action of the current route.
     * @param string $url
     */
    public function Init() {
        $urlParts = explode("/", $this->Uri);

        //@todo: Get the application base url
        $baseUrl = "/";
        $baseUrlConstainsVirtualPath = !(strcasecmp("/", $baseUrl) === 0);
        $startIndex = $baseUrlConstainsVirtualPath ? self::StartIndexWithVirtualPath : self::StartIndexNoVirtualPath;

        $this->setUrl($url);
        if (array_key_exists($startIndex, $urlParts) && array_key_exists($startIndex + 1, $urlParts)) {
            $this->setModule($urlParts[$startIndex]);
            $this->setAction($urlParts[$startIndex + 1]);
        } else {
            $this->Init($this->defaultUrl);
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

    /**
     * Gets the module of the route.
     * @return string
     */
    public function controller() {
        return $this->Controller;
    }

    public function setUrl($url) {
    }

    public function setDefaultUrl($defaultUrl) {
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
