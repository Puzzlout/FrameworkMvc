<?php

namespace Puzzlout\FrameworkMvc\System\Globalization;

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package GetResxRequest
 */
class GetResxRequest {

    const SOURCE_XML = 'FROM_XML';
    const SOURCE_DB = 'FROM_DB';
    const SOURCE_CLASS = 'FROM_CLASS';

    protected $Source;
    protected $Key;
    protected $Group;
    protected $Controller;
    protected $Action;
    protected $CultureName;
    
    public function __construct($source) {
        $this->Source = $source;
    }
    
    public static function init($source) {
        $obj = new GetResxRequest($source);
        return $obj;
    }
    
    
    public function setKey($key) {
        $this->Key = $key;
        return $this;
    }
    
    
    public function setGroup($group) {
        $this->Group = $group;
        return $this;
    }
    
    public function setController($controller) {
        $this->Controller = $controller;
        return $this;
    }
    
    
    public function setAction($action) {
        $this->Action = $action;
        return $this;
    }
    
    public function setCultureName($param) {
        
    }
}
