<?php

/**
 * UploadedFilesParser is responsible of reading $_FILES and returning it to the request context.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package UploadedFilesParser
 */

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

class UploadedFilesParser implements InputParserInterface {

    /**
     * Static instanctiation for chained methods calls.
     * @return \Puzzlout\FrameworkMvc\System\Web\HttpRequest\UploadedFilesParser
     */
    public static function init() {
        $instance = new UploadedFilesParser();
        return $instance;
    }

    /**
     * Reads $_FILES to retrieve the data and extract the associative array.
     * @return array
     */
    public function parse() {
        $filesData = $_FILES;
        if (is_null($filesData)) {
            return [];
        }

        return $filesData;
    }

}
