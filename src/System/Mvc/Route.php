<?php

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;
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

    private $request;
    protected $Controller;
    protected $Action;
    protected $Uri;

    /**
     * 
     * 
     * @var int
     */
    private $UriPartStartIndex;

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
     * The constructor taking a ServerContext object to retrieve the request URI.
     * 
     * @param \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext $serverContext
     */
    public function __construct(RequestBase $request) {
        $this->request = $request;
        $this->setUri($request->serverContext());
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
        $startIndex = $this->getUriPartsStartIndex();

        $uriParts = explode("/", $this->Uri);

        if ($startIndex === self::URI_PART_START_WITHOUT_APP_ALIAS && count($uriParts) > 3) {
            $errMsg = "Given the current URI, you must set the App Alias in the request inputs! URI is " . $this->Uri .
                    " and APP_ALIAS is " . $this->request->appAlias() . " Check that you called the fill method in " .
                    " the class RequestBase";
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
     * Gets url of the route.
     * @return string
     */
    public function uri() {
        return $this->Uri;
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
        if (StringValidator::init($this->request->appAlias())->IsNullOrEmpty()) {
            return self::URI_PART_START_WITHOUT_APP_ALIAS;
        }

        $uriRegex = '`^.[' . strtolower($this->request->appAlias()) . '].*$`';
        $uriContainsAppAlias = preg_match($uriRegex, $this->Uri);
        $startIndex = $uriContainsAppAlias ?
                self::URI_PART_START_WITH_APP_ALIAS :
                self::URI_PART_START_WITHOUT_APP_ALIAS;

        return $startIndex;
    }

    public function setUri(ServerContext $serverContext) {
        $rawUri = $serverContext->getValueFor(ServerContext::INPUT_SERVER, ServerConst::REQUEST_URI);
        $queryString = $serverContext->getValueFor(ServerContext::INPUT_SERVER, ServerConst::QUERY_STRING);
        $uriWithoutQueryString = strtok($rawUri, '?');
        $uriWithHash = strtok($uriWithoutQueryString, '#');

        if (StringValidator::init($uriWithHash)->IsNullOrEmpty()) {
            $errMsg = '$_SERVER[REQUEST_URI] must not be null or empty.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }

        $this->Uri = strtolower($uriWithHash);
    }

    public function setAction($action) {
        $partsQs = explode('?', $action);
        $partsHash = explode('#', $action);

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
