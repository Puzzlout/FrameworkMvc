<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\WebClientData;

class WebClientDataTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new WebClientData();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\WebClientData', $result);
    }

    //Write the next tests below...
    public function testInstanceWithInit() {
        $instance = WebClientData::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\WebClientData', $instance);
        return $instance;
    }

}