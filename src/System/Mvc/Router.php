<?php

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;

/**
 * Route class
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/FrameworkMvc
 * @since Version 1.0.0
 * @package Route
 */
class Router {


    const NO_ROUTE = 1;
    const CurrentRouteVarKey = "CurrentRoute";

    public function __construct(RequestBase $request) {
        ;
    }

    public static function Init(RequestBase $request) {
        $instance = new Router($request);
        return $instance;
    }
}
