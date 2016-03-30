<?php

namespace Puzzlout\Framework\Core;

use Puzzlout\Framework\FrameworkConstants;

class Router extends ApplicationComponent {

    public $url;
    public $pageUrls = array();
    public $isWsCall = false;
    protected $routes = array();
    protected $currentRoute;

    const NO_ROUTE = 1;
    const CurrentRouteVarKey = "CurrentRoute";

    /**
     * 
     * @param \Puzzlout\Framework\Core\Application $app
     * @param string $url
     * @return \Puzzlout\Framework\Core\Router
     */
    public static function Init(Application $app) {
        $instance = new Router($app);
        return $instance;
    }

    /**
     * 
     * @param \Puzzlout\Framework\Core\Application $app
     * @param string $url
     * @throws \Exception
     */
    public function __construct(Application $app) {
        if (is_null($app)) {
            throw new \Exception('$app cannot be null!', 0, null);
        }
        parent::__construct($app);
        $request = new Request($app);
        $this->url = $request->RequestUriExist() ? $request->requestURI() : "";
    }

    /**
     * Set the route of the current request. 
     * @param \Puzzlout\Framework\Core\Route $route
     */
    public function setCurrentRoute() {
        $this->currentRoute = $this->FindRouteMatch();
    }

    /**
     * Get the route of the current request. 
     * @param \Puzzlout\Framework\Core\Route $route
     */
    public function currentRoute() {
        if (is_null($this->currentRoute)) {
            $this->setCurrentRoute();
        }
        return $this->currentRoute;
    }

    /**
     * Set the array of route objects. 
     * @param array $routes
     */
    public function setRoutes($routes) {
        $this->routes = $routes;
    }

    /**
     * Get the array of route objects. 
     * @param array $routes
     */
    public function routes() {
        return $this->routes;
    }

    /**
     * Add a route to the array of routes if not already in the array.
     * 
     * @param \Puzzlout\Framework\Core\Route $route
     */
    public function addRoute(Route $route) {
        if (!in_array($route, $this->routes)) {
            $this->routes[] = $route;
        }
    }

    /**
     * Instanciate the Route object from the current request.
     * 
     * @return \Puzzlout\Framework\Core\Route the Route instance
     */
    private function FindRouteMatch() {
        $route = new Route();
        $route->setDefaultUrl(Config::Init($this->app)->Get(\Puzzlout\Framework\Enums\AppSettingKeys::DefaultUrl));
        $this->getRoute($route, $this->url);
        return $route;
    }

    /**
     * Search for a match route in the last of routes based on a relative url from
     * the current request.
     * 
     * @param Route $route the instance of the Route to use in the current request.
     * @param string $url relative url of the current request. 
     * @return mixed \Puzzlout\Framework\Core\Route | \Exception
     * @throws \Exception Is thrown if FrameworkConstants::"APP_BASE_URL" is not set. 
     */
    public function getRoute(Route $route, $url) {
        $route->Init($url);
    }

}
