<?php

/**
 * This class is a helper for mocking ddata for unit tests.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package UnitTestHelper
 */

namespace Puzzlout\FrameworkMvc\Tests;

class UnitTestHelper {

    const PACKAGE = 'FrameworkMvc';

    public static function jsonFilePathFor($filename) {
        $fullPath = self::rootDir() . $filename;
        return $fullPath;
    }

    public static function rootDir() {
        return dirname(dirname(__FILE__)) . "/tests/json/";
    }

}
