<?php

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest;
use Puzzlout\Exceptions\Classes\Core\RuntimeException;
use Puzzlout\Exceptions\Classes\NotImplementedException;
use Puzzlout\Exceptions\Codes\GeneralErrors;
use Puzzlout\Exceptions\Codes\LogicErrors;
use Puzzlout\FrameworkMvc\Commons\Validation\StringValidator;

/**
 * Route class
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/FrameworkMvc
 * @since Version 1.0.0
 * @package Route
 */
class Route {

    private $Request;
    protected $Controller;
    protected $Action;

    /**
     * When no application alias is found in the URI (ex: /controller/action?querystring), the controller will be found
     * at index 1 when exploding the URI. 
     * Why? The exploding result is: 
     *      <code>["", "controller", "action?querystring"]</code>
     */
    const URI_PART_START_WITHOUT_APP_ALIAS = 1;

    /**
     * When an application alias is found in the URI (ex: /app_alias/controller/action?querystring), the controller will
     * be found at index 2 when exploding the URI. Why? The exploding result is: 
     *      <code>["", "app_alias", "controller", "action?querystring"]</code>
     */
    const URI_PART_START_WITH_APP_ALIAS = 2;

    /**
     * The constructor taking a GetRouteRequest object to build the object.
     * 
     * @param \Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest $request
     */
    public function __construct(GetRouteRequest $request) {
        $this->Request = $request;
    }

    /**
     * Instantiate the class and return it to chain method calls.
     * 
     * @param \Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest $request
     * @return \Puzzlout\FrameworkMvc\System\Mvc\Route
     */
    public static function init(GetRouteRequest $request) {
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
        $startIndex = $this->getUriPartsStartIndex();

        $uriParts = explode("/", $this->Request->Uri);

        if ($startIndex === self::URI_PART_START_WITHOUT_APP_ALIAS && count($uriParts) > 3) {
            $errMsg = "Given the current URI, you must set the App Alias in the request inputs! URI is " . 
                    $this->Request->Uri . " and APP_ALIAS is " . $this->Request->AppAlias . 
                    ". Check that you called the fill method in the class RequestBase";
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }

        //Is this statement ever going to be true? Since the method setUri checks if the URI is not empty or null,  the
        //index $startIndex and $startIndex + 1 should always exist.
        if (!isset($uriParts[$startIndex]) && !isset($uriParts[$startIndex + 1])) {
            $errMsg = '$uriParts doesn\'t contain the index ' . $startIndex . ' or ' . ($startIndex + 1);
            throw new NotImplementedException($errMsg, 0, null);
        }

        $this->setController($uriParts[$startIndex]);
        $this->setAction($uriParts[$startIndex + 1]);
        return $this;
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

    /**
     * If the Request->AppAlias is null or empty, then the URI will not contain the App Alias. So we know what index to
     * return.
     * 
     * 
     * 
     * @return int The Start Index to set the controller and action value.
     */
    public function getUriPartsStartIndex() {
        if (StringValidator::init($this->Request->AppAlias)->IsNullOrEmpty()) {
            return self::URI_PART_START_WITHOUT_APP_ALIAS;
        }

        $uriRegex = '`^.[' . strtolower($this->Request->AppAlias) . '].*$`';
        $uriContainsAppAlias = preg_match($uriRegex, $this->Request->Uri);
        $startIndex = $uriContainsAppAlias ?
                self::URI_PART_START_WITH_APP_ALIAS :
                self::URI_PART_START_WITHOUT_APP_ALIAS;

        return $startIndex;
    }

    public function setAction($action) {
        if (empty($action)) {
            throw new RuntimeException("Action cannot be empty", LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        if (!is_string($action)) {
            throw new RuntimeException("Action must be a string", LogicErrors::PARAMETER_VALUE_INVALID, null);
        }

        $this->Action = $action;
    }

    public function setController($controller) {
        if (empty($controller)) {
            throw new RuntimeException("Controller cannot be empty", LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        if (!is_string($controller)) {
            throw new RuntimeException("Controller must be a string", LogicErrors::PARAMETER_VALUE_INVALID, null);
        }

        $this->Controller = $controller;
    }

}
