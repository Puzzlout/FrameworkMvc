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

    /**
     * Instantiate the class.
     */
    public static function init() {
        $instance = new UrlExtensions();
        return $instance;
    }

    /**
     * Validate the url given. TRUE is a valid URL. FALSE is an invalid URL.
     * 
     * @param string $url The URL to test
     * @return bool
     * @todo move regex in a constants file
     */
    public function validate($url) {   
        return preg_match('`^http:\/\/((([a-z]|\d)+\.)*(([a-z]|\d)+))([/?].*)?$`', $url);
    }

}
