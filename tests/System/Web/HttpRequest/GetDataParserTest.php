<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\GetDataParser;

class GetDataParserTest extends \PHPUnit_Framework_TestCase {

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
        $result = new GetDataParser();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\GetDataParser', $result);
    }

    //Write the next tests below...
    public function testInstanceIsCorrectWithInit() {
        $result = GetDataParser::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\GetDataParser', $result);
        return $result;
    }

    public function testParseMethodWithNoGetData() {
        $instance = $this->testInstanceIsCorrectWithInit();
        $this->assertNotNull($instance->parse());
        $this->assertCount(0, $instance->parse());
    }

    public function testParseMethodWithGetData() {
        $instance = $this->testInstanceIsCorrectWithInit();
        $_GET = [self::UNIT_TEST => self::UNIT_TEST];
        $this->assertNotNull($instance->parse());
        $this->assertCount(1, $instance->parse());
    }

}
