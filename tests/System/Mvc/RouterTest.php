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
    public function testExtractCleanUriWithEmtpyValue() {
        
    }

    public function testExtractCleanUriWithNullValue() {
        
    }

    public function testExtractCleanUriWithValidValue() {
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
        $index = rand(0, $routeCount - 1);
        $route = $instance->getRouteAtIndex($index);
        $this->assertInstanceOf('\Puzzlout\FrameworkMvc\System\Mvc\Route', $route);
        $this->assertSame('controller', $route->controller());
        $this->assertSame('action', $route->action());
        return $instance;
    }

    public function testGetRouteAtInvalidIndex() {
        $instance = $this->testGetRouteAtValidIndex();
        try {
            $routeCount = $instance->routeCount();
            $index = rand($routeCount, $routeCount * 10);
            $instance->getRouteAtIndex($index);
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

}
