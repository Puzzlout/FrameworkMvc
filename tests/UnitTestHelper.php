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
    const UNIT_TEST = "unittest_value";

    public static function jsonFilePathFor($filename) {
        $fullPath = self::rootDir() . $filename;
        return $fullPath;
    }

    public static function rootDir() {
        return dirname(dirname(__FILE__)) . "/tests/json/";
    }

    public static function validInputs()
    {
        return [
            \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext::INPUT_POST => JsonFilesHelper::validJsonDataFile(),
            \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext::INPUT_GET => [self::UNIT_TEST => self::UNIT_TEST],
            \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext::INPUT_SESSION => [self::UNIT_TEST => self::UNIT_TEST],
            \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext::INPUT_COOKIE => [self::UNIT_TEST => self::UNIT_TEST],
            \Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext::INPUT_FILES => [self::UNIT_TEST => self::UNIT_TEST],
        ];
    }

}
