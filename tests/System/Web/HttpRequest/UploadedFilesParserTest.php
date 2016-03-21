<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\UploadedFilesParser;

class UploadedFilesParserTest extends \PHPUnit_Framework_TestCase {

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
        $result = new UploadedFilesParser();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\UploadedFilesParser', $result);
    }

    public function testInstanceWithInit() {
        $instance = UploadedFilesParser::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\UploadedFilesParser', $instance);
        return $instance;
    }

    //Write the next tests below...
    public function testParseMethodWithNoFilesData() {
        $instance = $this->testInstanceWithInit();
        $this->assertNotNull($instance->parse($_FILES));
        $this->assertCount(0, $instance->parse($_FILES));
    }

    public function testParseMethodWithFilesData() {
        $instance = $this->testInstanceWithInit();
        $_FILES = [self::UNIT_TEST => self::UNIT_TEST];
        $this->assertNotNull($instance->parse($_FILES));
        $this->assertCount(1, $instance->parse($_FILES));
    }

}
