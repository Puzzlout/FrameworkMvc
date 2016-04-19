<?php

/**
 * Class defining the request to load the Controller class.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package GetControllerRequest
 */

namespace Puzzlout\FrameworkMvc\System\Mvc;

class GetControllerRequest {

    protected $Request;
    protected $Route;
    protected $CultureInfo;

    public getClientContext() {
        return $this->Request->ClientContext;
    }
    
    public getServerContext() {
        return $this->Request->ServerContext;
    }
    
    public getRoute() {
        return $this->Route;
    }
    
    public getCultureInfo() {
        return $this->CultureInfo; 
    }
}
