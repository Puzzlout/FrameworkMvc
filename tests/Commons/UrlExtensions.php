<?php

/**
 * Provides methods for url manipulations.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package UrlExtensions
 */

namespace Puzzlout\FrameworkMvc\Commons;

class UrlExtensions {

    public static function init() {
        $instance = new UrlExtensions();
        return $instance;
    }

    /**
     * Validate the url given.
     * 
     * @param string $url
     */
    public function validate($url) {   
        return true;
    }

}
