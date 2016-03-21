<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\PostDataParser;

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
    }

    //Write the next tests below...

    public function testInstanceWithInit() {
        $result = PostDataParser::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\PostDataParser', $result);
    }

    public function testParseMethod() {
        $result = PostDataParser::init()->parse();
        $this->assertTrue(is_array($result));
    }

}
