<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ArrayListAlgorithm
 */

namespace Puzzlout\FrameworkMvc\Commons\FileManager\Algorithms;

class ArrayListAlgorithm {

    public static function init() {
        $instance = new ArrayListAlgorithm();
        return $instance;
    }

    public function excludeList() {
        return array(
            "\\.",
            "\\.\\.",
        );
    }

    public function excludeListForTestSuite() {
        $specific = array(
            "src",
            "Generator",
            ".DS_Store",
            "FrameworkConstants.php",
            "Mailer",
        );
        $list = array_merge($specific, self::excludeList());
        return $list;
    }

}
