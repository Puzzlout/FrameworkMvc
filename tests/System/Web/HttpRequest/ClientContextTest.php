<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext;

class ClientContextTest extends \PHPUnit_Framework_TestCase {

    const UNIT_TEST = "unittest_value";
    public $inputs;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = [
            ClientContext::INPUT_POST => "php://input",
            ClientContext::INPUT_GET => [self::UNIT_TEST => self::UNIT_TEST],
            ClientContext::INPUT_SESSION => [self::UNIT_TEST => self::UNIT_TEST],
            ClientContext::INPUT_COOKIE => [self::UNIT_TEST => self::UNIT_TEST],
            ClientContext::INPUT_FILES => [self::UNIT_TEST => self::UNIT_TEST],
        ];
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new ClientContext($this->inputs);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext', $result);
        return $result;
    }

    //Write the next tests below...
    public function testInstanceWithInit() {
        $instance = ClientContext::init($this->inputs);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext', $instance);
        return $instance;
    }

    public function testInputPostIsArrayWithConstructor() {
        $this->assertTrue(is_array($this->testInstanceIsCorrect()->inputPost()));
    }

    public function testInputGetIsArrayWithConstructor() {
        $this->assertTrue(is_array($this->testInstanceIsCorrect()->inputGet()));
    }

    public function testInputSessionIsArrayWithConstructor() {
        $this->assertTrue(is_array($this->testInstanceIsCorrect()->inputSession()));
    }

    public function testCookiesIsArrayWithConstructor() {
        $this->assertTrue(is_array($this->testInstanceIsCorrect()->cookies()));
    }

    public function testFilesIsArrayWithConstructor() {
        $this->assertTrue(is_array($this->testInstanceIsCorrect()->files()));
    }

    public function testInputPostIsArrayWithInit() {
        $this->assertTrue(is_array($this->testInstanceWithInit()->inputPost()));
    }

    public function testInputGetIsArrayWithInit() {
        $this->assertTrue(is_array($this->testInstanceWithInit()->inputGet()));
    }

    public function testInputSessionIsArrayWithInit() {
        $this->assertTrue(is_array($this->testInstanceWithInit()->inputSession()));
    }

    public function testCookiesIsArrayWithInit() {
        $this->assertTrue(is_array($this->testInstanceWithInit()->cookies()));
    }

    public function testFilesIsArrayWithInit() {
        $this->assertTrue(is_array($this->testInstanceWithInit()->files()));
    }

    public function testFillMethodFailingWithInvalidPostInput() {
        $this->inputs[ClientContext::INPUT_POST] = null;
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->fill();
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testValidateMethodFailingWithUnsetdPostInput() {
        unset($this->inputs[ClientContext::INPUT_POST]);
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->validate();
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testValidateMethodFailingWithUnsetdGetInput() {
        unset($this->inputs[ClientContext::INPUT_GET]);
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->validate();
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testValidateMethodFailingWithUnsetdSessionInput() {
        unset($this->inputs[ClientContext::INPUT_SESSION]);
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->validate();
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testValidateMethodFailingWithUnsetdCookiesInput() {
        unset($this->inputs[ClientContext::INPUT_COOKIE]);
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->validate();
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testValidateMethodFailingWithUnsetdFilesInput() {
        unset($this->inputs[ClientContext::INPUT_FILES]);
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->validate();
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testFillMethodSuccess() {
        $this->inputs[ClientContext::INPUT_POST] = \Puzzlout\FrameworkMvc\Tests\JsonFilesHelper::validJsonDataFile();
        $instance = $this->testInstanceIsCorrect();
        $instance->fill();
        $this->assertTrue(is_array($instance->inputPost()));
        $this->assertTrue(is_array($instance->inputGet()));
        $this->assertTrue(is_array($instance->inputSession()));
        $this->assertTrue(is_array($instance->cookies()));
        $this->assertTrue(is_array($instance->files()));
    }
}
