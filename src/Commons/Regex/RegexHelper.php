<?php

/**
 * Provides functions with regular expressions.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package RegexHelper
 */

namespace Puzzlout\FrameworkMvc\Commons\Regex;

class RegexHelper {

    private $List;
    private $valueToTest;

    public function __construct() {
        $this->List = array();
    }

    public function setValueToTest($valueToTest) {
        $this->valueToTest = $valueToTest;
    }

    public static function init($valueToTest) {
        $regex = new RegexHelper();
        $regex->setValueToTest($valueToTest);
        return $regex;
    }

    public function stringContainsWhiteSpace() {
        if (!is_string($this->valueToTest)) {
            return false;
        }
        $result = preg_match(CommonRegexes::SEARCH_WHITE_SPACE, $this->valueToTest);
        return $result > 0 ? true : false;
    }

    public function isResoureKeyValid() {
        $result = preg_match_all(CommonRegexes::RESOURCE_KEY_VALIDATION, $this->valueToTest);
        return $result > 0 ? true : false;
    }

    public function isAPhpFilename() {
        $result = preg_match(CommonRegexes::SEARCH_PHP_EXTENSION, $this->valueToTest);
        return $result > 0 ? true : false;
    }

    public function isMatch($pattern) {
        if (empty($pattern) || !is_string($pattern)) {
            return false;
        }

        $result = preg_match($pattern, $this->valueToTest);
        return $result > 0 ? true : false;
    }

}
