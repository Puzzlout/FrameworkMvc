<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package RouterMock
 */

namespace Puzzlout\FrameworkMvc\Tests\Mocks;

use Puzzlout\FrameworkMvc\System\Mvc\Router;

class RouterMock extends Router {

    public function __construct(\Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase $request) {
        parent::__construct($request);
    }
    
    public static function Init(\Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase $request) {
        return parent::Init($request);
    }
    
    public function testExtractCleanUri() {
        return parent::extractCleanUri();
    }
    
    public function testBuildGetRouteRequest()
    {
        return parent::buildGetRouteRequest();
    }
}

