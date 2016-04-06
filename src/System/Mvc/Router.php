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
    private $Routes;

    public function __construct(RequestBase $request) {
        $this->Request = $request;
        $this->Routes = [];
    }

    public static function Init(RequestBase $request) {
        $instance = new Router($request);
        return $instance;
    }

    
    public function findRoute() {
        $getRouteRequest = $this->buildGetRouteRequest();
        $route = Route::init($getRouteRequest);
        array_push($this->Routes, $route);
    }

    /**
     * Instantiate a GetRouteRequest to build a Route object.
     * 
     * @return \Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest
     */
    protected function buildGetRouteRequest() {
        $finalUri = $this->extractQueryStringFreeUri();
        $appAlias = $this->request->appAlias();
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
    protected function extractQueryStringFreeUri() {
        $rawUri = $this->Request->serverContext()->getValueFor(ServerContext::INPUT_SERVER, ServerConst::REQUEST_URI);
        $queryString = $this->Request->serverContext()->getValueFor(ServerContext::INPUT_SERVER, ServerConst::QUERY_STRING);
        $uriWithoutQueryString = strtok($rawUri, '?');
        $uriWithHash = strtok($uriWithoutQueryString, '#');

        if (StringValidator::init($uriWithHash)->IsNullOrEmpty()) {
            $errMsg = '$_SERVER[REQUEST_URI] must not be null or empty.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }
        return strtolower($uriWithHash);
    }

}
