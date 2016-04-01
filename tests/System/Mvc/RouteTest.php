<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\Route;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class RouteTest extends \PHPUnit_Framework_TestCase {
    private $request;
  /**
   * Initialize the app object.
   */
  protected function setUp()
  {
      $this->request = new RequestBase(UnitTestHelper::simulationRealValidInputs());
  }
  
  /**
   * This method is generated.
   */
  public function testInstanceIsCorrect()
  {
    $result = new Route($this->request);
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Route', $result);
  }
  
  public function testInstanceWithInit() {
      $instance = Route::init($this->request);
      $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Route', $instance);
      return $instance;
  }

  
  //Write the next tests below...
  
}