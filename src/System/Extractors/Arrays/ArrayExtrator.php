<?php

/**
 * Base class to 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ArrayExtrator
 */

namespace Puzzlout\FrameworkMvc\System\Extractors\Arrays;

abstract class ArrayExtrator {
    /**
     * The array variable from which is extracted the data.
     * @var array 
     */
    protected $TheArray;
    
    /**
     * Defines where the array's origin.
     * @var Puzzlout\Objects\Types\Str 
     */
    protected $Source;
}
