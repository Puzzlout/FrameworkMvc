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
use Puzzlout\FrameworkMvc\Commons\DirectoryHelper;

class FindControllerHelperTest extends \PHPUnit_Framework_TestCase {

    private $inputs;
    private $getRouteRequest;
    private $route;
    private $validControllerDir;
    private $invalidControllerDir;

    const VALID_CONTROLLER_FOLDER = "/../testdata/TestControllerFolders/ValidControllersFolder/Controllers";
    const INVALID_CONTROLLER_FOLDER =  "/../testdata/TestControllerFolders/InvalidControllersFolder/Controllers";
    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = UnitTestHelper::simulationRealValidInputs();
        $this->inputs[\Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase::APP_ALIAS] = "App";
        $this->getRouteRequest = new GetRouteRequest('App', '/App/Account/Create?test=true');
        $this->route = Route::init($this->getRouteRequest)->fill();
        $this->validControllerDir = DirectoryHelper::init()->rootDir() . self::VALID_CONTROLLER_FOLDER;
        $this->invalidControllerDir = DirectoryHelper::init()->rootDir() . self::INVALID_CONTROLLER_FOLDER;
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new FindControllerHelper($this->validControllerDir, $this->route);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\FindControllerHelper', $instance);
    }

    public function testInstanceWithInit() {
        $instance = FindControllerHelper::init($this->validControllerDir, $this->route);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\FindControllerHelper', $instance);
        return $instance;
    }

    public function testInstanciationFailing() {
        try {
            new FindControllerHelper($this->invalidControllerDir, $this->route);
        } catch (\Puzzlout\Exceptions\Classes\Core\LogicException $exc) {
            $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\LogicException", $exc);
        }
    }
    //Write the next tests below...

    public function testGetList() {
        $instance = new FindControllerHelper($this->validControllerDir, $this->route);
        $controllers = $instance->getControllerList();
        $this->assertTrue(4 === count($controllers));
        foreach ($controllers as $controllerHash => $controllerFileName) {
            $this->assertArrayHasKey(sha1($controllerFileName), $controllers);
        }
    }
    
    public function testGetListOfController() {
        $instance = $this->testInstanceWithInit();
        $controller = $instance->findController();
        $this->assertNotEmpty($controller);
        $this->assertSame("AccountController", $controller);
        
    }

}
