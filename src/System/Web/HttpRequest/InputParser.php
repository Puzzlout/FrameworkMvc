<?php

/**
 * InputParser is responsible of reading the given global variable and returning its value to the request context.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package InputParser
 */

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

class InputParser implements InputParserInterface {

    /**
     * Static instanctiation for chained methods calls.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\InputParser
     */
    public static function init() {
        $instance = new InputParser();
        return $instance;
    }

    /**
      /**
     * Reads the given global variable to retrieve the data and extract the associative array.
     * @param mixed $input
     * @return type
     */
    public function parse($input) {
        if (is_null($input)) {
            return [];
        }
        return $input;
    }

}
