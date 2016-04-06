<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\Router;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class RouterTest extends \PHPUnit_Framework_TestCase {

    private $request;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->request = new RequestBase(UnitTestHelper::simulationRealValidInputs());
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new Router($this->request);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Router', $result);
    }

    public function testInstanceWithInit() {
        $instance = Router::init($this->request);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\Router', $instance);
        return $instance;
    }

    //Write the next tests below...
}
