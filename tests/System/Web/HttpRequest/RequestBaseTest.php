<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;
use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class RequestBaseTest extends \PHPUnit_Framework_TestCase {

    const UNIT_TEST = "unittest_value";

    public $inputs;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = UnitTestHelper::validInputs();
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new RequestBase($this->inputs);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase', $result);
        return $result;
    }

    public function testInstanceWithInit() {
        $instance = RequestBase::init($this->inputs);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase', $instance);
        return $instance;
    }

    //Write the next tests below...


    public function testSetAppName() {
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->setAppName();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testSetValidAppName() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $instance = new RequestBase($inputs);
        $result = $instance->setAppName();
        $this->assertInstanceOf('\Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase', $result);
        $this->assertNotEmpty($instance->appName());
    }

    public function testSetInvalidAppName() {
        $inputs = UnitTestHelper::simulationRealInvalidInputs();
        $instance = new RequestBase($inputs);
        try {
            $instance->setAppName();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testSetUrlMethodWithNoData() {
        try {
            $this->testInstanceWithInit()->setUrl();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testSetUrlWithValidInputs() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $instance = RequestBase::init($inputs);
        $instance->setUrl();
        $this->assertNotEmpty($instance->url());
    }

    public function testSetUrlWithInvalidInputs() {
        $inputs = UnitTestHelper::simulationRealInvalidInputs();
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_URI] = " /notvalid";
        $inputs[ServerContext::INPUT_SERVER][ServerConst::HTTP_HOST] = "example";
        try {
            $instance = RequestBase::init($inputs);
            $instance->setUrl();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testSetHttpVerbWithValidInput() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        $instance = RequestBase::init($inputs);
        $this->assertInstanceOf('\Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase', $instance->setHttVerb());
        $this->assertEquals('GET', $instance->httpVerb());
    }

    public function testSetHttpVerbWithRequestMethodEmpty() {
        $inputs = UnitTestHelper::simulationRealInvalidInputs();
        try {
            $instance = RequestBase::init($inputs);
            $instance->setHttVerb();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $ex) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\RuntimeException', $ex);
        }
    }

    public function testSetHttpVerbWithRequestMethodNull() {
        $inputs = UnitTestHelper::simulationRealInvalidInputs();
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_METHOD] = null;
        try {
            $instance = RequestBase::init($inputs);
            $instance->setHttVerb();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $ex) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\RuntimeException', $ex);
        }
    }

    public function testSetHttpVerbWithRequestMethodUnsupported() {
        $inputs = UnitTestHelper::simulationRealInvalidInputs();
        $inputs[ServerContext::INPUT_SERVER][ServerConst::REQUEST_METHOD] = "INVALID";
        try {
            $instance = RequestBase::init($inputs);
            $instance->setHttVerb();
        } catch (\Puzzlout\Exceptions\Classes\NotImplementedException $ex) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\NotImplementedException', $ex);
        }
    }

}
