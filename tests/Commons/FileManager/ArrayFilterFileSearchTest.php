<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\Commons\FileManager;

use Puzzlout\FrameworkMvc\Commons\FileManager\ArrayFilterFileSearch;

class ArrayFilterFileSearchTest extends \PHPUnit_Framework_TestCase {
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
    $instance = new ArrayFilterFileSearch();
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\ArrayFilterFileSearch', $instance);
  }
  
  public function testInstanceWithInit() {
      $instance = ArrayFilterFileSearch::init();
      $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\ArrayFilterFileSearch', $instance);
      return $instance;
  }

  
  //Write the next tests below...
  
}