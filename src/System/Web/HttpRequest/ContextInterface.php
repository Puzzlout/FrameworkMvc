<?php

/**
 * Contract used when building the request context.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ContextInterface
 */

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

interface ContextInterface {

    /**
     * Intantiate the class implementing the interface with the given inputs.
     */
    public static function init($inputs);

    /**
     * Fill the instance with the request data.
     */
    public function fill();

    /**
     * Validates the inputs given to the context class.
     */
    public function validate();

    /**
     * Retrieve a specific value for the key and input type given.
     */
    public function getValueFor($inputType, $key);
}
