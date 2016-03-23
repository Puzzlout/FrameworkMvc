<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\PostDataParser;
use Puzzlout\FrameworkMvc\Tests\JsonFilesHelper;

class PostDataParserTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new PostDataParser();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\PostDataParser', $result);
        return $result;
    }

    //Write the next tests below...

    public function testInstanceWithInit() {
        $result = PostDataParser::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\PostDataParser', $result);
        return $result;
    }

    public function testParseMethodWhenFileContainsValidJson() {
        $instance = $this->testInstanceIsCorrect();
        $this->assertTrue(is_array($instance->parse(JsonFilesHelper::validJsonDataFile())));
    }

    public function testParseMethodWhenFileContainsValidJsonHavingPropertyNull() {
        $instance = $this->testInstanceIsCorrect();
        $this->assertTrue(is_array($instance->parse(JsonFilesHelper::validJsonDataFilePropertyNull())));
    }

    public function testParseMethodWhenFileDoesntExist() {
        try {
            PostDataParser::init()->parse(JsonFilesHelper::inexistantFile());
        } catch (\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\InvalidArgumentException', $exc);
        }
    }

    public function testParseMethodWhenFileContainsInvalidJson() {
        try {
            PostDataParser::init()->parse(JsonFilesHelper::invalidJsonDataFile());
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

}
