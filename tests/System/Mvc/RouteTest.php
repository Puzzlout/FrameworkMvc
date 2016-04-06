<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\Route;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;
use Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest;
use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class RouteTest extends \PHPUnit_Framework_TestCase {

    private $inputs;
    private $getRouteRequest;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = UnitTestHelper::simulationRealValidInputs();
        $this->getRouteRequest = new GetRouteRequest('App', 'Uri');
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new Route($this->getRouteRequest);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Route', $result);
    }

    public function testInstanceWithInit() {
        $instance = Route::init($this->getRouteRequest);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Route', $instance);
        return $instance;
    }

    public function testGetUriPartsStartIndexWithEmptyAppAlias() {
        $this->getRouteRequest->AppAlias = "";
        $instance = new Route($this->getRouteRequest);
        $index = $instance->getUriPartsStartIndex();
        $this->assertEquals(1, $index);
    }

    public function testGetUriPartsStartIndexWithNullAppAlias() {
        $this->getRouteRequest->AppAlias = null;
        $instance = new Route($this->getRouteRequest);
        $index = $instance->getUriPartsStartIndex();
        $this->assertEquals(1, $index);
    }

    public function testGetUriPartsStartIndexWithAppAliasAndUri() {
        $this->getRouteRequest->AppAlias = 'App';
        $this->getRouteRequest->Uri = strtolower('/App/Controller/Action?querystring=true');
        $instance = new Route($this->getRouteRequest);
        $index = $instance->getUriPartsStartIndex();
        $this->assertEquals(2, $index);
    }

    public function testGetUriPartsStartIndexWithAppAliasNotInUri() {
        $this->getRouteRequest->AppAlias = 'App';
        $this->getRouteRequest->Uri = strtolower('/Controller/Action?querystring=true');
        $instance = Route::init($this->getRouteRequest);
        $index = $instance->getUriPartsStartIndex();
        $this->assertEquals(1, $index);
    }

    public function testSetControllerMethodWhenValueEmpty() {
        $route = $this->testFillMethodWithValidData();
        try {
            $route->setController("");
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\RuntimeException", $exc);
        }
    }

    public function testSetControllerMethodWhenValueNotString() {
        $route = $this->testFillMethodWithValidData();
        try {
            $route->setController(1);
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\RuntimeException", $exc);
        }
    }

    public function testSetControllerMethodWhenValueValid() {
        $route = $this->testFillMethodWithValidData();
        $this->assertSame("controller", $route->controller());
    }

    public function testSetActionMethodWhenValueEmpty() {
        $route = $this->testFillMethodWithValidData();
        try {
            $route->setAction("");
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\RuntimeException", $exc);
        }
    }

    public function testSetActionMethodWhenValueNotString() {
        $route = $this->testFillMethodWithValidData();
        try {
            $route->setAction(1);
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\RuntimeException", $exc);
        }
    }

    public function testSetActionMethodWhenValueValid() {
        $route = $this->testFillMethodWithValidData();
        $this->assertSame("action", $route->action());
    }

    public function testFillMethodWithValidData() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $inputs[RequestBase::APP_ALIAS] = '';
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/Controller/Action?querystring=true';
        $request = RequestBase::init($inputs)->fill();
        $instance = Route::init($request)->fill();
        $this->assertTrue($instance->controller() === "controller");
        $this->assertTrue($instance->action() === "action");
        return $instance;
    }

    public function testFillMethodWithValidDataAndAppAlias() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $inputs[RequestBase::APP_ALIAS] = 'App';
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/App/Controller/Action?querystring=true';
        $request = RequestBase::init($inputs)->fill();
        $instance = Route::init($request)->fill();
        $this->assertTrue($instance->controller() === "controller");
        $this->assertTrue($instance->action() === "action");
        return $instance;
    }

    public function testFillMethodOnRuntimeException() {
        $this->getRouteRequest->AppAlias = '';
        $this->getRouteRequest->Uri = strtolower('/App/Controller/Action?querystring=true');
        try {
            $instance = Route::init($this->getRouteRequest)->fill();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\RuntimeException", $exc);
        }
    }

    //Write the next tests below...
}
