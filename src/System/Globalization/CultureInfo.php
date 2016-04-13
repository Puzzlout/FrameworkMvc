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

    public function __construct($name) {
        $this->Name = $name;
    }

    public static function init($name) {
        $instance = new CultureInfo($name);
        return $instance;
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
