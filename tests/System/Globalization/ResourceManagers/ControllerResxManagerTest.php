<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Globalization\ResourceManagers;

use Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers\ControllerResxManager;
use Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers\GetResxRequest;
use Puzzlout\FrameworkMvc\System\Globalization\CultureInfo;

class ControllerResxManagerTest extends \PHPUnit_Framework_TestCase {

    private $getResxRequest;
    private $cultureInfo;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->cultureInfo = new CultureInfo("fr-FR");
        $this->getResxRequest = GetResxRequest::init(GetResxRequest::SOURCE_CLASS)
                ->setController("controller")
                ->setAction("action")
                ->setCultureName($this->cultureInfo);
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new ControllerResxManager($this->getResxRequest);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers\ControllerResxManager', $instance);
        return $instance;
    }

    //Write the next tests below...
    public function testGetList() {
        
    }

    public function testGetValue() {
        
    }

    public function testGetComment() {
        
    }

}
