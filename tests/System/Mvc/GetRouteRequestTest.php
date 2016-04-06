<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest;

class GetRouteRequestTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new GetRouteRequest("", "");
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Mvc\GetRouteRequest', $result);
        $this->assertEmpty($result->AppAlias);
        $this->assertEmpty($result->Uri);
    }

    //Write the next tests below...
    
    public function testMembersAreNotEmpty() {
        $instance = new GetRouteRequest("App", "Uri");
        $this->assertNotEmpty($instance->AppAlias);
        $this->assertNotEmpty($instance->Uri);
        $this->assertSame("App", $instance->AppAlias);
        $this->assertSame("Uri", $instance->Uri);
    }
}
