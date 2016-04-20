<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\GetControllerRequestBuilder;
use Puzzlout\FrameworkMvc\System\Mvc\GetControllerRequest;

class GetControllerRequestBuilderTest extends \PHPUnit_Framework_TestCase {

    private $getControllerRequest;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->getControllerRequest = new GetControllerRequest();
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new GetControllerRequestBuilder($this->getControllerRequest);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\GetControllerRequestBuilder', $instance);
    }

    public function testInstanceWithInit() {
        $instance = GetControllerRequestBuilder::init($this->getControllerRequest);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\GetControllerRequestBuilder', $instance);
        return $instance;
    }

    //Write the next tests below...
}
