<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ClassName
 */

namespace Puzzlout\FrameworkMvc\System\Web;

interface InputParserInterface {

    /**
     * Intantiate the class implementing the interface.
     */
    public function init();
    
    /**
     * Parse the data.
     */
    public function parse();
    
    /** 
     * Validates the data.
     */
    public function validateData();
}
