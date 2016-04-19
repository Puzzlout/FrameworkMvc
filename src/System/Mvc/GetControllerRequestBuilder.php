<?php

/**
 * Class buidling the request to load the Controller class.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package GetControllerRequestBuilder
 */

namespace Puzzlout\FrameworkMvc\System\Mvc;

class GetControllerRequestBuilder {

    public $Result;

    public function __construct(GetControllerRequest $getControllerRequest) {
        $this->Result = $getControllerRequest;
    }

    public static init(GetControllerRequest $getControllerRequest) {
        $instance = new GetControllerRequestBuilder($getControllerRequest);
        return $instance;
    }
    
    public setRequest(RequestBase $request) {
        $this->Result->Request = $request;
        return $this;
    }
    
    public setRoute(Route $route) {
        $this->Result->Route = $route;
        return $this;
    }
    
    public getCultureInfo(CultureInfo $cultureInfo) {
        $this->Result->CultureInfo = $cultureInfo;
        return $this; 
    }
}
