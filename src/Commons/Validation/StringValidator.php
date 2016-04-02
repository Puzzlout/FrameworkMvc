<?php

/**
 * StringValidator provides a list of methods to validate a string value.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package StringValidator
 */

namespace Puzzlout\FrameworkMvc\Commons\Validation;

class StringValidator {

    /**
     * The value to validate.
     * 
     * @var string 
     */
    protected $Value;

    /**
     * The constructor.
     * 
     * @param string $value
     */
    public function __construct($value) {
        $this->Value = $value;
    }

    /**
     * The instantiator of the class to chain method calls.
     * 
     * @param string $value
     * @return \Puzzlout\FrameworkMvc\Commons\Validation\StringValidator
     */
    public static function init($value) {
        $instance = new StringValidator($value);
        return $instance;
    }

    /**
     * Verify if the value is null or empty.
     * 
     * @return bool
     */
    public function IsNullOrEmpty() {
        $isNull = is_null($this->Value);
        $isEmpty = empty($this->Value);
        return $isNull || $isEmpty;
    }

}
