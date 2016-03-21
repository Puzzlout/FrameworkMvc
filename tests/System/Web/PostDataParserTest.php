<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web;

use Puzzlout\FrameworkMvc\System\Web\PostDataParser;

class PostDataParserTest extends \PHPUnit_Framework_TestCase {
  /**
   * Initialize the app object.
   */
  protected function setUp()
  {
      
  }
  
  /**
   * This method is generated.
   */
  public function testInstanceIsCorrect()
  {
    $result = new PostDataParser();
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\PostDataParser', $result);
  }
  
  //Write the next tests below...
  
  public function testInstanceWithInit() {
    $result = PostDataParser::init();
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\PostDataParser', $result);
  }
  
  public function testParseMethod() {
      $result = PostDataParser::init()->parse();
      $this->assertTrue(is_array($result));
  }
}