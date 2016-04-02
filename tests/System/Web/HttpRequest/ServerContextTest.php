<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class ServerContextTest extends \PHPUnit_Framework_TestCase {

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
        $result = new ServerContext($this->inputs);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext', $result);
        return $result;
    }

    //Write the next tests below...
    public function testInstanceIsCorrectWithInit() {
        $result = ServerContext::init($this->inputs);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext', $result);
        return $result;
    }

    public function testInstancePropertiesAreCorrect() {
        $instance = $this->testInstanceIsCorrect();
        $this->assertTrue(is_array($instance->server()));
        $this->assertTrue(is_array($instance->environment()));
    }

    public function testInitInstancePropertiesAreCorrect() {
        $instance = $this->testInstanceIsCorrectWithInit();
        $this->assertTrue(is_array($instance->server()));
        $this->assertTrue(is_array($instance->environment()));
    }

    public function testFillWithInputServer() {
        $instance = $this->testInstanceIsCorrect();
        $instance->fill();
        $this->assertTrue(is_array($instance->server()));
    }

    public function testFillWithInputEnv() {
        $instance = $this->testInstanceIsCorrect();
        $instance->fill();
        $this->assertTrue(is_array($instance->environment()));
    }

    public function testFillMethodFailingWithInvalidServerInput() {
        unset($this->inputs[ServerContext::INPUT_SERVER]);
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->validate();
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testValidateMethodFailingWithUnsetdEnvironmentInput() {
        unset($this->inputs[ServerContext::INPUT_ENV]);
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->validate();
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testValidateMethodSuccess() {
        $instance = $this->testInstanceIsCorrect();
        $this->assertInstanceOf('\Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext', $instance->validate());
    }

    public function testGetValueForMethodFirstException1() {
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->getValueFor(null, null);
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testGetValueForMethodFirstException2() {
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->getValueFor(null, "");
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testGetValueForMethodFirstException3() {
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->getValueFor("", null);
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testGetValueForMethodFirstException4() {
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->getValueFor("", "");
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testGetValueForMethodSwitchException() {
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->getValueFor("null", "null");
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testGetValueForMethodWhereEnvValueForKeyIsEmpty() {
        $instance = $this->testInstanceIsCorrect();
        $this->assertEmpty($instance->getValueFor(ServerContext::INPUT_ENV, "keynotexists"));
    }

    public function testGetValueForMethodWhereEnvValueForKeyIsNotEmpty() {
        $instance = $this->testInstanceIsCorrect();
        $this->assertEmpty($instance->getValueFor(ServerContext::INPUT_ENV, UnitTestHelper::UNIT_TEST));
    }

    public function testGetValueForMethodWhereServerValueForKeyIsEmpty() {
        $instance = $this->testInstanceIsCorrect();
        $this->assertEmpty($instance->getValueFor(ServerContext::INPUT_SERVER, "keynotexists"));
    }

    public function testGetValueForMethodWhereServerValueForKeyIsNotEmpty() {
        $instance = $this->testInstanceIsCorrect();
        $this->assertEmpty($instance->getValueFor(ServerContext::INPUT_SERVER, UnitTestHelper::UNIT_TEST));
    }

}
