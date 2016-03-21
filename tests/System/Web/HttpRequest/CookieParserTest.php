<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\CookieParser;

class CookieParserTest extends \PHPUnit_Framework_TestCase {

    const UNIT_TEST = "unittest";

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new CookieParser();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\CookieParser', $result);
    }

    //Write the next tests below...
    public function testInstanceIsCorrectWithInit() {
        $result = CookieParser::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\CookieParser', $result);
        return $result;
    }

    public function testParseMethodWithNoCookieData() {
        $instance = $this->testInstanceIsCorrectWithInit();
        $this->assertNotNull($instance->parse($_COOKIE));
        $this->assertCount(0, $instance->parse($_COOKIE));
    }

    public function testParseMethodWithCookieData() {
        $instance = $this->testInstanceIsCorrectWithInit();
        $_COOKIE = [self::UNIT_TEST => self::UNIT_TEST];
        $this->assertNotNull($instance->parse($_COOKIE));
        $this->assertCount(1, $instance->parse($_COOKIE));
    }

}
