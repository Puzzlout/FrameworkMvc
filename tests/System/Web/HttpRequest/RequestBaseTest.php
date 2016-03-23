<?php

/**
 * 
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
    }

    public function testInstanceWithInit() {
        $instance = RequestBase::init($this->inputs);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase', $instance);
        return $instance;
    }

    //Write the next tests below...
}
