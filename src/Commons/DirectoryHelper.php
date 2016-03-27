<?php

/**
 * The class provides common methods for directory manipulations.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package DirectoryHelper
 */

namespace Puzzlout\FrameworkMvc\Commons;

class DirectoryHelper {

    public static function init() {
        $instance = new DirectoryHelper();
        return $instance;
    }
    
    public function rootDir() {
        return dirname(dirname(__FILE__));
    }
}
