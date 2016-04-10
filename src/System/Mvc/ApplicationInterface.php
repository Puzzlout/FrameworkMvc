<?php

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;

/**
 * Defines the contracts for all Mvc applications
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ApplicationInterface
 */
interface ApplicationInterface {

    /**
     * The server creates an instance of the Application class found in the source root directory.
     */
    public function init(RequestBase $request);

    /**
     * The Application instance computes the Route object the Request URL and store it in itself. 
     */
    public function retrieveRoute();

    /**
     * The Application instance searches the Controller and its Action.
     * Exceptions:
     *      - The Controller doesn’t exist. Throw a RuntimeException with code error CONTROLLER_NOT_FOUND
     *      - The Action doesn’t exist. Throw a RuntimeException with code error ACTION_NOT_FOUND
     */
    public function findController();

    /**
     * The Application instance executes the Controller’s Action to generate a Response object
     * If an error occurred in the execution of the Action, throw RuntimeException with code “DEFAULT_ERROR"
     */
    public function processRequest();
}
