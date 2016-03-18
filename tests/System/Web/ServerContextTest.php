<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web;

use Puzzlout\FrameworkMvc\System\Web\ServerContext;

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
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\ServerContext', $result);
    }

    //Write the next tests below...
    public function testInstanceIsCorrectWithInit() {
        $result = ServerContext::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\ServerContext', $result);
    }

    public function testInstancePropertiesAreCorrect() {
        $instance = new ServerContext();
        $this->assertTrue(is_array($instance->Server()));
        $this->assertTrue(is_array($instance->Environment()));
    }

    public function testInitInstancePropertiesAreCorrect() {
        $instance = ServerContext::init();
        $this->assertTrue(is_array($instance->Server()));
        $this->assertTrue(is_array($instance->Environment()));
    }

    public function testFillWithInputServer() {
        $instance = new ServerContext();
        $result = $instance->fill(INPUT_SERVER);
        var_dump($result->Server());
        $this->assertTrue(is_array($result->Server()));
    }

    public function testFillWithInputEnv() {
        $instance = new ServerContext();
        $result = $instance->fill(INPUT_ENV);
        var_dump($result->Environment());
        $this->assertTrue(is_array($result->Environment()));
    }

    public function testFillWithInputCookie() {
        $instance = new ServerContext();
        try {
            $result = $instance->fill(INPUT_COOKIE);
        } catch (\Exception $exc) {
            $this->assertInstanceOf("\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException", $exc);
        }
    }

    public function testFillWithInvalidInput() {
        $instance = new ServerContext();
        try {
            $result = $instance->fill("");
        } catch (\Exception $exc) {
            $this->assertInstanceOf("\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException", $exc);
        }
    }
    
    public function testPropertyServerExists()
    {
        $this->assertTrue(property_exists("\Puzzlout\FrameworkMvc\System\Web\ServerContext", "Server"));
    }

}
