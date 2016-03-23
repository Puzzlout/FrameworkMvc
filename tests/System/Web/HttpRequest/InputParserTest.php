<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\InputParser;

class InputParserTest extends \PHPUnit_Framework_TestCase {
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
    $result = new InputParser();
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\InputParser', $result);
  }
  
  public function testInstanceWithInit() {
      $instance = InputParser::init();
      $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\InputParser', $instance);
      return $instance;
  }

  public function testParseWhenInputIsNull() {
      $instance = $this->testInstanceWithInit();
      $this->assertTrue(is_array($instance->parse(null)));
      $this->assertTrue(count($instance->parse(null)) === 0);
  }
  
  //Write the next tests below...
  
}