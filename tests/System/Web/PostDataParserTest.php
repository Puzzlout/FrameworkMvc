<?php

/**
 * 
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
      file_put_contents("php://input", json_encode('{"test": "test"}'));
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
  
}