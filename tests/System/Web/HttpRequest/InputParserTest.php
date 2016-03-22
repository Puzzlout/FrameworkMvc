<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\InputParser;

class InputParserTest extends \PHPUnit_Framework_TestCase {

    const UNIT_TEST = 'unittest';
    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new InputParser();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\InputParser', $result);
    }

    public function testInstanceWithInit() {
        $instance = InputParser::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\InputParser', $instance);
        return $instance;
    }

    //Write the next tests below...
    public function testParseMethodWithNoFilesData() {
        $instance = $this->testInstanceWithInit();
        $this->assertNotNull($instance->parse($_FILES));
        $this->assertCount(0, $instance->parse($_FILES));
    }

    public function testParseMethodWithNullFilesData() {
        $instance = $this->testInstanceWithInit();
        $this->assertNotNull($instance->parse(null));
        $this->assertCount(0, $instance->parse(null));
    }

    public function testParseMethodWithFilesData() {
        $instance = $this->testInstanceWithInit();
        $_FILES = [self::UNIT_TEST => self::UNIT_TEST];
        $this->assertNotNull($instance->parse($_FILES));
        $this->assertCount(1, $instance->parse($_FILES));
    }

    public function testParseMethodWithNoCookieData() {
        $instance = $this->testInstanceWithInit();
        $this->assertNotNull($instance->parse($_COOKIE));
        $this->assertCount(0, $instance->parse($_COOKIE));
    }

    public function testParseMethodWithNullCookieData() {
        $instance = $this->testInstanceWithInit();
        $this->assertNotNull($instance->parse(null));
        $this->assertCount(0, $instance->parse(null));
    }

    public function testParseMethodWithCookieData() {
        $instance = $this->testInstanceWithInit();
        $_COOKIE = [self::UNIT_TEST => self::UNIT_TEST];
        $this->assertNotNull($instance->parse($_COOKIE));
        $this->assertCount(1, $instance->parse($_COOKIE));
    }

    public function testParseMethodWithNoGetData() {
        $instance = $this->testInstanceWithInit();
        $this->assertNotNull($instance->parse($_GET));
        $this->assertCount(0, $instance->parse($_GET));
    }

    public function testParseMethodWithNullGetData() {
        $instance = $this->testInstanceWithInit();
        $this->assertNotNull($instance->parse(null));
        $this->assertCount(0, $instance->parse(null));
    }

    public function testParseMethodWithGetData() {
        $instance = $this->testInstanceWithInit();
        $_GET = [self::UNIT_TEST => self::UNIT_TEST];
        $this->assertNotNull($instance->parse($_GET));
        $this->assertCount(1, $instance->parse($_GET));
    }

    public function testParseMethodWithNoSessionData() {
        $instance = $this->testInstanceWithInit();
        $_SESSION = null;
        $this->assertNotNull($instance->parse($_SESSION));
        $this->assertCount(0, $instance->parse($_SESSION));
    }

    public function testParseMethodWithSessionData() {
        $instance = $this->testInstanceWithInit();
        $_SESSION = [self::UNIT_TEST => self::UNIT_TEST];
        $this->assertNotNull($instance->parse($_SESSION));
        $this->assertCount(1, $instance->parse($_SESSION));
    }

}
