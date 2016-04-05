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

namespace Puzzlout\FrameworkMvc\Tests\MockingHelpers;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
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
        return self::rootDir() . "/json/";
    }

    public static function validInputs() {
        $inputs = \Puzzlout\FrameworkMvc\Tests\BaseInputs::Get();
        $inputs[ClientContext::INPUT_POST] = JsonFilesHelper::validJsonDataFile();
        return $inputs;
    }

    public static function simulationRealValidInputs() {
        $inputs = self::validInputs();
        $inputs[RequestBase::APP_ALIAS] = "FrameworkMvc";
        return $inputs;
    }

    public static function simulationRealInvalidInputs() {
        $inputs = self::validInputs();
        unset($inputs[RequestBase::APP_ALIAS]);
        return $inputs;
    }

}
