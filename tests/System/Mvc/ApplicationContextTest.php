<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\ApplicationContext;

class ApplicationContextTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new ApplicationContext();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\ApplicationContext', $instance);
    }

    public function testInstanceWithInit() {
        $instance = ApplicationContext::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\ApplicationContext', $instance);
        return $instance;
    }

    //Write the next tests below...

    public function testReadSetting() {
        $instance = new ApplicationContext();
        $value = $instance->readSetting("test");
        $this->assertSame("test", $value);
    }

}
