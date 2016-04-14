<?php

namespace Puzzlout\FrameworkMvc\System\Globalization;

/**
 * Holds the information about a culture.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package CultureInfo
 */
class CultureInfo {

    protected $Name;

    /**
     * The construction sets the member Name.
     * 
     * @param string $name The culture name value.
     */
    public function __construct($name) {
        $this->Name = $name;
        $this->validate();
    }

    /**
     * Instantiate the class for chained calls.
     * 
     * @param string $name The culture name value.
     * @return \Puzzlout\FrameworkMvc\System\Globalization\CultureInfo
     */
    public static function init($name) {
        $instance = new CultureInfo($name);
        return $instance;
    }

    /**
     * Validate the Name member with a regex: ^[a-z]{2,3}(?:-[A-Z]{2,3}(?:-[a-zA-Z]{4})?)?$.
     * 
     * @throws \Puzzlout\Exceptions\Classes\Core\LogicException
     */
    protected function validate() {
        if(!(preg_match("`^[a-z]{2,3}(?:-[A-Z]{2,3}(?:-[a-zA-Z]{4})?)?$`", $this->Name) === 0)) {
            $errMsg = "The culture name is not valid.";
            throw new \Puzzlout\Exceptions\Classes\Core\LogicException($errMsg, \Puzzlout\Exceptions\Codes\LogicErrors::UNEXPECTED_VALUE, null);
        }
    }
    /**
     * Getter of member Name.
     * 
     * @return string
     */
    public function getName() {
        return $this->Name;
    }
    
    public function getLanguage() {
        throw new \Puzzlout\Exceptions\Classes\NotImplementedException();
    }

    public function getRegion() {
        throw new \Puzzlout\Exceptions\Classes\NotImplementedException();
    }

    public function getIso639() {
        throw new \Puzzlout\Exceptions\Classes\NotImplementedException();
    }

    public function getDisplayName() {
        throw new \Puzzlout\Exceptions\Classes\NotImplementedException();
    }

}
