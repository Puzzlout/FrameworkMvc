<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;

class ServerContextTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new ServerContext();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext', $result);
        return $result;
    }

    //Write the next tests below...
    public function testInstanceIsCorrectWithInit() {
        $result = ServerContext::init();
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
}
