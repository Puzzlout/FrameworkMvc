<?php

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;
use Puzzlout\FrameworkMvc\Commons\Validation\StringValidator;
use Puzzlout\Exceptions\Classes\Core\InvalidArgumentException;
use Puzzlout\Exceptions\Classes\Core\RuntimeException;
use Puzzlout\Exceptions\Codes\LogicErrors;
use Puzzlout\Exceptions\Codes\GeneralErrors;

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
class Router {

    /**
     * The current request.
     * 
     * @var Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase 
     */
    private $Request;

    /**
     * The list of Routes computed.
     * 
     * @var array
     */
    protected $Routes;

    /**
     * The constructor initializing the Request and Routes members.
     * 
     * @param \Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase $request
     */
    public function __construct(RequestBase $request) {
        $this->Request = $request;
        $this->Routes = [];
    }

    /**
     * Instantiate the class for use of chain method calls.
     * 
     * @param \Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase $request
     * @return \Puzzlout\FrameworkMvc\System\Mvc\Router
     */
    public static function Init(RequestBase $request) {
        $instance = new Router($request);
        return $instance;
    }

    /**
     * Getter of Routes member.
     * 
     * @return array
     */
    public function routes() {
        return $this->Routes;
    }

    /**
     * Count the number of routes stored in the member Routes.
     * 
     * @return int
     */
    public function routeCount() {
        return count($this->Routes);
    }

    /**
     * Retrieve a route for a given index.
     * 
     * @param int $index The index searched.
     * @return Puzzlout\FrameworkMvc\System\Mvc\Route The route matching the index.
     * @throws InvalidArgumentException When the $index parameter value is not found in the Routes member.
     */
    //public function getRouteAtIndex($index) {
    //    if (!isset($this->Routes[$index])) {
    //        $err = "The index '$index' was not found in the Routes list.";
    //        throw new InvalidArgumentException($err, LogicErrors::PARAMETER_VALUE_INVALID, null);
    //    }
    //    return $this->Routes[$index];
    //}

    /**
     * Retrieve a route for a given key.
     * 
     * @param string $key The key searched.
     * @return Puzzlout\FrameworkMvc\System\Mvc\Route The route matching the key.
     * @throws InvalidArgumentException When the $key parameter value is not found in the Routes member.
     */
    public function getRouteAtKey($key) {
        if (!isset($this->Routes[$key])) {
            $err = "The key '$key' was not found in the Routes list.";
            throw new InvalidArgumentException($err, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        return $this->Routes[$key];
    }

    public function findRoute() {
        $getRouteRequest = $this->buildGetRouteRequest();
        $route = Route::init($getRouteRequest)->fill();
        if(!isset($this->Routes[$getRouteRequest->Uri])) {
            $this->Routes[$getRouteRequest->Uri] = $route;
        }
        //array_push($this->Routes, $route);
        
    }

    /**
     * Instantiate a GetRouteRequest to build a Route object.
     * 
     * @return \Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest
     */
    protected function buildGetRouteRequest() {
        $finalUri = $this->extractCleanUri();
        $appAlias = $this->Request->appAlias();
        $getRouteRequest = new GetRouteRequest($appAlias, $finalUri);
        return $getRouteRequest;
    }

    /**
     * Computes the URI free from the query string or hash value.
     * 
     * @return string
     * @throws RuntimeException When the URI is null or empty.
     * @todo Create error code
     */
    protected function extractCleanUri() {
        $rawUri = $this->Request->serverContext()->getValueFor(ServerContext::INPUT_SERVER, ServerConst::REQUEST_URI);
        $uriWithoutQueryString = strtok($rawUri, '?');
        $uriWithHash = strtok($uriWithoutQueryString, '#');

        if (StringValidator::init($uriWithHash)->IsNullOrEmpty()) {
            $errMsg = '$_SERVER[REQUEST_URI] must not be null or empty.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }
        return strtolower($uriWithHash);
    }

}
