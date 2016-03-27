<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\Commons;

use Puzzlout\FrameworkMvc\Commons\DirectoryHelper;

class DirectoryHelperTest extends \PHPUnit_Framework_TestCase {
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
    $result = new DirectoryHelper();
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\DirectoryHelper', $result);
  }
  
  public function testInstanceWithInit() {
      $instance = DirectoryHelper::init();
      $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\DirectoryHelper', $instance);
      return $instance;
  }

  
  //Write the next tests below...
  public function testRootDirMethod() {
      $this->assertNotEmpty($this->testInstanceWithInit()->rootDir());
  }
}