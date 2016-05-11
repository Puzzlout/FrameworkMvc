<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Globalization;

use Puzzlout\FrameworkMvc\System\Globalization\CultureInfo;

class CultureInfoTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new CultureInfo("fr-FR");
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Globalization\CultureInfo', $instance);
    }

    public function testInstanceWithInit() {
        $instance = CultureInfo::init("fr-FR");
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Globalization\CultureInfo', $instance);
        return $instance;
    }

    //Write the next tests below...
}
