<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext;

class RequestBaseTest extends \PHPUnit_Framework_TestCase {

    const UNIT_TEST = "unittest_value";

    public $inputs;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = [
            ClientContext::INPUT_POST => "php://input",
            ClientContext::INPUT_GET => [self::UNIT_TEST => self::UNIT_TEST],
            ClientContext::INPUT_SESSION => [self::UNIT_TEST => self::UNIT_TEST],
            ClientContext::INPUT_COOKIE => [self::UNIT_TEST => self::UNIT_TEST],
            ClientContext::INPUT_FILES => [self::UNIT_TEST => self::UNIT_TEST],
        ];
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
