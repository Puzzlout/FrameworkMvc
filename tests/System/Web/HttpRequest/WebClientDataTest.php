<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\WebClientData;

class WebClientDataTest extends \PHPUnit_Framework_TestCase {

    public $inputs;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = [
            WebClientData::INPUT_POST => "value_post",
            WebClientData::INPUT_GET => "value_get",
            WebClientData::INPUT_SESSION => "value_session",
            WebClientData::INPUT_COOKIE => "value_cookie",
            WebClientData::INPUT_FILES => "value_files",
        ];
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new WebClientData();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\WebClientData', $result);
        return $result;
    }

    //Write the next tests below...
    public function testInstanceWithInit() {
        $instance = WebClientData::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\WebClientData', $instance);
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

    public function testValidateMethodExceptions() {
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->validate(null);
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testFillMethodFailingWithInvalidPostInput() {
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->fill($this->inputs);
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

}
