<?php

/**
 * This class helps getting json files and data to run unit tests
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package JsonFilesHelper
 */

namespace Puzzlout\FrameworkMvc\Tests;

class JsonFilesHelper {

    const VALID_JSON_FILE = "valid.json";
    const INVALID_JSON_FILE = "invalid.json";
    const NOT_FOUND_FILE = "doesntexist.json";
    const VALID_JSON_FILE_PROPERTY_NULL = "valid_with_property_null_value.json";
    
    public static function validJsonDataFile() {
        return \Puzzlout\FrameworkMvc\Tests\UnitTestHelper::jsonFilePathFor(self::VALID_JSON_FILE);
    }

    public static function invalidJsonDataFile() {
        return \Puzzlout\FrameworkMvc\Tests\UnitTestHelper::jsonFilePathFor(self::INVALID_JSON_FILE);
    }

    public static function inexistantFile() {
        return \Puzzlout\FrameworkMvc\Tests\UnitTestHelper::jsonFilePathFor(self::NOT_FOUND_FILE);
    }
    
    public static function validJsonDataFilePropertyNull() {
        return \Puzzlout\FrameworkMvc\Tests\UnitTestHelper::jsonFilePathFor(self::VALID_JSON_FILE_PROPERTY_NULL);
    }

}
