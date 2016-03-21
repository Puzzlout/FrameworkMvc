<?php

/**
 * CookieParser is responsible of reading the $_COOKIE variable and returning it to the request context.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package CookieParser
 */

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

class CookieParser implements InputParserInterface {

    /**
     * Static instanctiation for chained methods calls.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\CookieParser
     */
    public static function init() {
        $instance = new CookieParser();
        return $instance;
    }

    /**
     * Reads $_COOKIE to retrieve the data and extract the associative array.
     * @return array
     */
    public function parse($input) {
        return $input;
    }

}
