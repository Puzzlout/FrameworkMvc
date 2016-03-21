<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ClassName
 */

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

interface InputParserInterface {

    /**
     * Intantiate the class implementing the interface.
     */
    public static function init();

    /**
     * Parse the data.
     */
    public function parse();
}
