<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\Router;
use Puzzlout\FrameworkMvc\Tests\Mocks\RouterMock;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;
use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class RouterTest extends \PHPUnit_Framework_TestCase {

    private $request;
    private $inputs;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = UnitTestHelper::simulationRealValidInputs();
        $this->request = new RequestBase($this->inputs);
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new RouterMock($this->request);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Router', $result);
        $this->assertTrue(is_array($result->routes()));
        $this->assertEmpty($result->routes());
    }

    public function testInstanceWithInit() {
        $instance = RouterMock::init($this->request);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Router', $instance);
        return $instance;
    }

    //Write the next tests below...
    public function testExtractCleanUriWithValidValueByTestingResultingRoute() {
        $this->inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/App/Controller/Action?querystring=1';
        $this->request = RequestBase::init($this->inputs)->fill();
        $instance = new RouterMock($this->request);
        $instance->findRoute();
        $this->assertCount(1, $instance->routes());
        return $instance;
    }

    public function testRouteCountEquals0() {
        $instance = new Router($this->request);
        $this->assertCount(0, $instance->routes());
    }

    public function testRouteCountIsGreaterThan0() {
        $this->inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/App/Controller/Action?querystring=1';
        $this->request = RequestBase::init($this->inputs)->fill();
        $instance = new Router($this->request);
        $instance->findRoute();
        $this->assertTrue($instance->routeCount() === 1);
    }

    public function testGetRouteAtValidIndex() {
        $this->inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/App/Controller/Action?querystring=1';
        $this->request = RequestBase::init($this->inputs)->fill();
        $instance = new Router($this->request);
        $instance->findRoute();
        $routeCount = $instance->routeCount();
        $key = strtolower("/App/Controller/Action");
        $route = $instance->getRouteAtKey($key);
        $this->assertInstanceOf('\Puzzlout\FrameworkMvc\System\Mvc\Route', $route);
        $this->assertSame('controller', $route->controller());
        $this->assertSame('action', $route->action());
        return $instance;
    }

    public function testGetRouteAtInvalidIndex() {
        $instance = $this->testGetRouteAtValidIndex();
        try {
            $routeCount = $instance->routeCount();
            $key = strtolower("/App/Controller/Action2");
            $instance->getRouteAtKey($key);
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testExtractCleanUriWithEmptyValue() {
        $this->inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '';
        $this->request = RequestBase::init($this->inputs)->fill();
        $instance = new RouterMock($this->request);
        try {
            $instance->testExtractCleanUri();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testExtractCleanUriWithNullalue() {
        $this->inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = null;
        $this->request = RequestBase::init($this->inputs)->fill();
        $instance = new RouterMock($this->request);
        try {
            $instance->testExtractCleanUri();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testExtractCleanUriWithUnsetValue() {
        unset($this->inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI]);
        $this->request = RequestBase::init($this->inputs)->fill();
        $instance = new RouterMock($this->request);
        try {
            $instance->testExtractCleanUri();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testExtractCleanUriWithValidValue() {
        $this->inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/App/Controller/Action?querystring=1';
        $this->request = RequestBase::init($this->inputs)->fill();
        $instance = new RouterMock($this->request);
        $uri = $instance->testExtractCleanUri();
        $this->assertSame('/app/controller/action', $uri);
    }

    public function testBuildGetRouteRequestThroughMock() {
        $this->inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/App/Controller/Action?querystring=1';
        $this->request = RequestBase::init($this->inputs)->fill();
        $instance = new RouterMock($this->request);
        $request = $instance->testBuildGetRouteRequest();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest', $request);
        $this->assertSame("frameworkmvc", $request->AppAlias);
        $this->assertSame("/app/controller/action", $request->Uri);
    }

}
