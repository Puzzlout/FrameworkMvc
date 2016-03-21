<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\SessionParser;

class SessionParserTest extends \PHPUnit_Framework_TestCase {

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
        $result = new SessionParser();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\SessionParser', $result);
    }

    public function testInstanceWithInit() {
        $instance = SessionParser::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\SessionParser', $instance);
        return $instance;
    }

    //Write the next tests below...
    public function testParseMethodWithNoSessionData() {
        $instance = $this->testInstanceWithInit();
        $this->assertNotNull($instance->parse());
        $this->assertCount(0, $instance->parse());
    }

    public function testParseMethodWithSessionData() {
        $instance = $this->testInstanceWithInit();
        $_SESSION = [self::UNIT_TEST => self::UNIT_TEST];
        $this->assertNotNull($instance->parse());
        $this->assertCount(1, $instance->parse());
    }

}
