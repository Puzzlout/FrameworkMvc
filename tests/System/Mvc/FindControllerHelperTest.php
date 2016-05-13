<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\FindControllerHelper;
use Puzzlout\FrameworkMvc\System\Mvc\Route;
use Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest;
use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class FindControllerHelperTest extends \PHPUnit_Framework_TestCase {

    private $inputs;
    private $getRouteRequest;
    private $route;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = UnitTestHelper::simulationRealValidInputs();
        $this->getRouteRequest = new GetRouteRequest('App', 'Uri');
        $this->route = new Route($this->getRouteRequest);
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new FindControllerHelper("", $this->route);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\FindControllerHelper', $instance);
    }

    public function testInstanceWithInit() {
        $instance = FindControllerHelper::init("", $this->route);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\FindControllerHelper', $instance);
        return $instance;
    }

    //Write the next tests below...

    public function testGetListOfController() {
        $instance = $this->testInstanceWithInit();
        //$controller = $instance->findController();
        //$this->assertNotEmpty($controller);
    }

}
