<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\Router;

class RouterTest extends \PHPUnit_Framework_TestCase {
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
    $result = new Router();
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Router', $result);
  }
  
  public function testInstanceWithInit() {
      $instance = Router::init();
      $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Router', $instance);
      return $instance;
  }

  
  //Write the next tests below...
  
}