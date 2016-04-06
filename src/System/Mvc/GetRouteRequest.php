<?php

/**
 * Class defining how to look for a route and returning the object Route.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package GetRouteRequest
 */

namespace Puzzlout\FrameworkMvc\System\Mvc;

class GetRouteRequest {
    public $AppAlias;
    public $Uri;
    
    /**
     * Constructor taking the appAlias and URI as parameters. They are extracted from the RequestBase inputs.
     * 
     * @param string $appAlias
     * @param string $uri
     * @see Puzzlout\FrameworkMvc\System\Mvc\Router class
     */
    public function __construct($appAlias, $uri) {
        $this->AppAlias = $appAlias;
        $this->Uri = $uri;
    }
}
