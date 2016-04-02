<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\Commons;

use Puzzlout\FrameworkMvc\Commons\UrlExtensions;

class UrlExtensionsTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new UrlExtensions();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\UrlExtensions', $result);
    }

    public function testInstanceWithInit() {
        $instance = UrlExtensions::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\UrlExtensions', $instance);
        return $instance;
    }

    //Write the next tests below...

    public function testValidateWithInvalidUrl() {
        $instance = $this->testInstanceWithInit();
        $this->assertTrue($instance->validate("http:// example.com/notvalid") === 0);
    }

    public function testValidateWithValidUrl() {
        $instance = $this->testInstanceWithInit();
        $this->assertTrue($instance->validate("http://example.com/valid") === 1);
    }

}
