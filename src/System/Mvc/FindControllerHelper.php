<?php

/**
 * Class buidling the request to load the Controller class.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package FindControllerHelper
 */

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\FrameworkMvc\System\Mvc\Route;
use Puzzlout\Exceptions\Classes\Core\LogicException;
use Puzzlout\Exceptions\Codes\MvcErrors;

class FindControllerHelper {

    private $Route;
    private $ControllerDirectory;
    public $Result;

    public function __construct($controllerDirectory, Route $route) {
        $this->Result = $this->getDefaultControllerName();
        $this->ControllerDirectory = $controllerDirectory;
        $this->Route = $route;
    }

    public static function init($controllerDirectory, Route $route) {
        $instance = new FindControllerHelper($controllerDirectory, $route);
        return $instance;
    }

    private function getDefaultControllerName(){
        $errorControllerName = "ErrorController";
        $errorControllerPath = $this->ControllerDirectory . "/" . $errorControllerName . "php";
        if(file_exists($errorControllerPath)) {
            $errMsg = "The ErrorController must exist in " . $this->ControllerDirectory;
            throw new \LogicException($errMsg, MvcErrors::ERROR_CONTROLLER_MUST_EXIST);
        }
        
        return $errorControllerName;
        
    }

    private function getControllerList() {
        $list = scandir($this->ControllerDirectory);
        return $list;
    }

    public function findController() {
        $controllerList = $this->getControllerList();
        return $this;
        }

}
