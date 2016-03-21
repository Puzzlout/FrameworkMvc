<?php

/**
 * GetDataParser is responsible for reading the data in $_GET and returning it to the request context.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package GetDataParser
 */

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

class GetDataParser implements InputParserInterface {

    /**
     * Static instanctiation for chained methods calls.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\GetDataParser
     */
    public static function init() {
        $instance = new GetDataParser();
        return $instance;
    }

    /**
     * Reads $_GET to retrieve the data and extract the associative array.
     * @return array
     */
    public function parse($input) {
        if (is_null($input)) {
            return [];
        }

        return $input;
    }

}
