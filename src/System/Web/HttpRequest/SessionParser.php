<?php

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

/**
 * SessionParser is responsible of reading $_SESSION and returning it to the request context.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package SessionParser
 * @see https://gist.github.com/voku/7c995ed2e19d78a164e2#file-input_filter-php-L176
 */
class SessionParser implements InputParserInterface {

    /**
     * Static instanctiation for chained methods calls.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\SessionParser
     */
    public static function init() {
        $instance = new SessionParser();
        return $instance;
    }

    /**
     * Reads $_SESSION to retrieve the data and extract the associative array.
     * @return array
     */
    public function parse() {
        $sessionData = $_SESSION;
        
        if (is_null($sessionData)) {
            return [];
        }

        return $sessionData;
    }

}
