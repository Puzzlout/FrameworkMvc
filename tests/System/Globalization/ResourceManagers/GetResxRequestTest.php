<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Globalization\ResourceManagers;

use Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers\GetResxRequest;

class GetResxRequestTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new GetResxRequest(GetResxRequest::SOURCE_DB);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers\GetResxRequest', $instance);
    }

    public function testInstanceWithInit() {
        $instance = GetResxRequest::init(GetResxRequest::SOURCE_DB);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers\GetResxRequest', $instance);
        return $instance;
    }

    //Write the next tests below...
}
