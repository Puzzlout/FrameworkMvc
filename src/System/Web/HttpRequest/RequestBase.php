<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/FrameworkMvc
 * @since Version 1.0.0
 * @package RequestBase
 */

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

class RequestBase {
    
    public $AppName;
    
    public $Uri;
    
    public $HttpVerb;
    
    public $ServerContext;
    
    public $ClientContext;
    
    public function __construct($inputs) {
        $this->ServerContext = ServerContext::init($inputs)->fill();
        $this->ClientContext = ClientContext::init($inputs)->fill();
    }
    
    public static function init($inputs) {
        $instance = new RequestBase($inputs);
        return $instance;
    }
    
}
