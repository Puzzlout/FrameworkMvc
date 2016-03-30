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

namespace Puzzlout\FrameworkMvc\Tests\MockingHelpers;

use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class JsonFilesHelper {

    const VALID_JSON_FILE = "valid.json";
    const INVALID_JSON_FILE = "invalid.json";
    const NOT_FOUND_FILE = "doesntexist.json";
    const VALID_JSON_FILE_PROPERTY_NULL = "valid_with_property_null_value.json";
    const EMPTY_FILE = "empty.json";
    
    public static function validJsonDataFile() {
        return UnitTestHelper::jsonFilePathFor(self::VALID_JSON_FILE);
    }

    public static function invalidJsonDataFile() {
        return UnitTestHelper::jsonFilePathFor(self::INVALID_JSON_FILE);
    }

    public static function inexistantFile() {
        return UnitTestHelper::jsonFilePathFor(self::NOT_FOUND_FILE);
    }
    
    public static function validJsonDataFilePropertyNull() {
        return UnitTestHelper::jsonFilePathFor(self::VALID_JSON_FILE_PROPERTY_NULL);
    }
    
    public static function emptyFile() {
        return UnitTestHelper::jsonFilePathFor(self::EMPTY_FILE);
    }

}
