<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext;
use Puzzlout\FrameworkMvc\Tests\UnitTestHelper;

class RequestBaseTest extends \PHPUnit_Framework_TestCase {

    const UNIT_TEST = "unittest_value";

    public $inputs;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = UnitTestHelper::validInputs();
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new RequestBase($this->inputs);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase', $result);
        return $result;
    }

    public function testInstanceWithInit() {
        $instance = RequestBase::init($this->inputs);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase', $instance);
        return $instance;
    }

    //Write the next tests below...

    public function testSetAppName() {
        $instance = $this->testInstanceIsCorrect();
        try {
            $instance->setAppName();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf('\Puzzlout\Exceptions\Classes\Core\RuntimeException', $exc);
        }
    }

    public function testSetValidAppName() {
        $inputs = UnitTestHelper::simulationRealValidInputs();
        //var_dump($inputs);
        $instance = new RequestBase($inputs);
        $instance->setAppName();
        $this->assertNotEmpty($instance->appName());
    }

}
