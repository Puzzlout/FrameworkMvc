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
use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class RouteTest extends \PHPUnit_Framework_TestCase {

    private $request;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->request = new RequestBase(UnitTestHelper::simulationRealValidInputs());
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new Route($this->request);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Route', $result);
    }

    public function testInstanceWithInit() {
        $instance = Route::init($this->request);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Route', $instance);
        return $instance;
    }

    public function testGetUriPartsStartIndexNoAppAlias() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $inputs[RequestBase::APP_ALIAS] = '';
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/Controller/Action?querystring=true';
        $request = RequestBase::init($inputs);
        $instance = Route::init($request);
        $index = $instance->getUriPartsStartIndex();
        $this->assertEquals(1, $index);
    }

    public function testGetUriPartsStartIndexWithAppAlias() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $inputs[RequestBase::APP_ALIAS] = 'App';
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/App/Controller/Action?querystring=true';
        $request = RequestBase::init($inputs)->fill();
        $instance = Route::init($request);
        $index = $instance->getUriPartsStartIndex();
        $this->assertEquals(2, $index);
    }

    public function testGetUriPartsStartIndexWithAppAliasNotInUri() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $inputs[RequestBase::APP_ALIAS] = 'App';
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '/Controller/Action?querystring=true';
        $request = RequestBase::init($inputs)->fill();
        $instance = Route::init($request);
        $index = $instance->getUriPartsStartIndex();
        $this->assertEquals(1, $index);
    }

    public function testSetUriWhenEmpty() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = '';
        $request = RequestBase::init($inputs)->fill();
        try {
            $instance = Route::init($request);
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testSetUriWhenNull() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = null;
        $request = RequestBase::init($inputs)->fill();
        try {
            $instance = Route::init($request);
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testSetUriWhenNotSet() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        unset($inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI]);
        $request = RequestBase::init($inputs)->fill();
        try {
            $instance = Route::init($request);
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testSetUriWhenSet() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = "uri";
        $request = RequestBase::init($inputs)->fill();
        $instance = Route::init($request);
        $this->assertSame("uri", $instance->uri());
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
            $route->setController(1);
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
        $inputs[ServerContext::INPUT_SERVER][ServerConst::QUERY_STRING] = 'querystring=true';
        $request = RequestBase::init($inputs);
        $instance = Route::init($request)->fill();
        $this->assertTrue($instance->controller() === "controller");
        //$this->assertTrue($instance->action() === "action");
        return $instance;
    }

    //Write the next tests below...
}
