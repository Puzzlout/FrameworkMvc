<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;

class ServerContextTest extends \PHPUnit_Framework_TestCase {

    const UNIT_TEST = "unittest_value";
    public $inputs;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = [
            ServerContext::INPUT_SERVER => [self::UNIT_TEST => self::UNIT_TEST],
            ServerContext::INPUT_ENV => [self::UNIT_TEST => self::UNIT_TEST],
        ];
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
        $this->inputs[ServerContext::INPUT_SERVER] = null;
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->fill();
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

}
