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

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ClientContext;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;

class UnitTestHelper {

    const PACKAGE = 'FrameworkMvc';
    const UNIT_TEST = "unittest_value";

    public static function jsonFilePathFor($filename) {
        $fullPath = self::dirTestJsonFiles() . $filename;
        return $fullPath;
    }

    public static function rootDir() {
        return dirname(dirname(__FILE__));
    }

    public static function dirTestJsonFiles() {
        return self::rootDir() . "/tests/json/";
    }

    public static function validInputs()
    {
        return [
            ClientContext::INPUT_POST => JsonFilesHelper::validJsonDataFile(),
            ClientContext::INPUT_GET => [self::UNIT_TEST => self::UNIT_TEST],
            ClientContext::INPUT_SESSION => [self::UNIT_TEST => self::UNIT_TEST],
            ClientContext::INPUT_COOKIE => [self::UNIT_TEST => self::UNIT_TEST],
            ClientContext::INPUT_FILES => [self::UNIT_TEST => self::UNIT_TEST],
            ServerContext::INPUT_SERVER => [self::UNIT_TEST => self::UNIT_TEST],
            ServerContext::INPUT_ENV => [self::UNIT_TEST => self::UNIT_TEST],

        ];
    }
    public static function simulationRealValidInputs()
    {
        $inputs = self::validInputs();
        $inputs[ServerContext::INPUT_SERVER] = GlobalServerVarHelper::serverVarWithValidRequestUri();
        return $inputs;
    }
    public static function simulationRealInvalidInputs()
    {
        $inputs = self::validInputs();
        $inputs[ServerContext::INPUT_SERVER] = GlobalServerVarHelper::serverVarWithInvalidRequestUri();
        return $inputs;
    }
}
