<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\Commons\Validation;

use Puzzlout\FrameworkMvc\Commons\Validation\StringValidator;

class StringValidatorTest extends \PHPUnit_Framework_TestCase {
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
    $result = new StringValidator("");
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\Validation\StringValidator', $result);
  }
  
  public function testInstanceWithInit() {
      $instance = StringValidator::init("");
      $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\Validation\StringValidator', $instance);
      return $instance;
  }

  
  //Write the next tests below...
  
}