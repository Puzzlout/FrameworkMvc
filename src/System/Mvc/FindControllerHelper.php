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
use Puzzlout\FrameworkMvc\Commons\FileManager\FileTreeExtractor;
use Puzzlout\FrameworkMvc\Commons\FileManager\Algorithms\ArrayListAlgorithm;
use Puzzlout\Exceptions\Classes\Core\LogicException;
use Puzzlout\Exceptions\Codes\MvcErrors;

class FindControllerHelper {

    const DEFAULT_CONTROLLER = "ErrorController";

    private $Route;
    private $ControllerDirectory;
    public $Result;

    public function __construct($controllerDirectory, Route $route) {
        $this->ControllerDirectory = $controllerDirectory;
        $this->Result = $this->getDefaultControllerName();
        $this->Route = $route;
    }

    public static function init($controllerDirectory, Route $route) {
        $instance = new FindControllerHelper($controllerDirectory, $route);
        return $instance;
    }

    private function getDefaultControllerName() {
        $errorControllerPath = $this->ControllerDirectory . "/" . self::DEFAULT_CONTROLLER . ".php";
        if (!file_exists($errorControllerPath)) {
            $errMsg = "The ErrorController must exist in " . $this->ControllerDirectory;
            throw new LogicException($errMsg, MvcErrors::ERROR_CONTROLLER_MUST_EXIST);
        }

        return self::DEFAULT_CONTROLLER;
    }

    public function getControllerList() {
        $targetDir = $this->ControllerDirectory;
        $filters = ArrayListAlgorithm::init()->excludeList();
        $list = FileTreeExtractor::init(FileTreeExtractor::HASH_ARRAY)->retrieveList($targetDir, $filters);
        return $list;
    }

    public function findController() {
        $controllerList = $this->getControllerList();
        $controllerToSearch = $this->Route->controller() .  "Controller.php";
        if(array_key_exists(sha1($controllerToSearch), $controllerList)) {
            $this->Result = str_replace(".php", "", $controllerList[sha1($controllerToSearch)]);            
        }
        return $this->Result;
    }

}
