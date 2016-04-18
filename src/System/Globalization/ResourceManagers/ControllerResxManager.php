<?php

namespace Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers;

/**
 * Base class for handling the controller resources.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ControllerResxManager
 */
class ControllerResxManager extends ResxManagerBase implements ResxManagerInterface {

    /**
     * Method that retrieve the array of resources.
     * 
     * @return array the array of ressources
     */
    public function GetList() {
        $namespacePrefix = "\\Puzzlout\\" .
                __PACKAGE_NAME__ .
                "\\Resources\\Controller\\";
        $resourceNamespace = $this->GetResourceNamespace($namespacePrefix, $this->ModuleValue);
        $resourceFile = new $resourceNamespace();
        return $resourceFile->GetList();
    }

    /**
     * Get the resource by module, action and key.
     * 
     * @param string $key the resource key to find
     * @return string the resource value
     * @todo create a error code for exception
     */
    public function GetValue($key) {
        $resources = $this->GetList();
        $actionLower = strtolower($this->ActionValue);
        $keyLower = strtolower($key);
        $actionExists = array_key_exists($actionLower, $resources);
        $keyExist = $actionExists ? array_key_exists($keyLower, $resources[$actionLower]) : false;
        if (!$actionExists) {
            $errMsg = "The resource value doesn't exist for Module => " .
                    $this->ModuleValue . " and Action => " . $this->ActionValue;
            throw new \Library\Exceptions\ResourceNotFoundException($errMsg, 0, null);
        }
        if (!$keyExist) {
            $errMsg = "The resource value doesn't exist for Module => " .
                    $this->ModuleValue . ", Action => " . $this->ActionValue . " and Key => " . $key;
            throw new \Library\Exceptions\ResourceNotFoundException($errMsg, 0, null);
        }

        return $resources[$actionLower][$keyLower][\Library\BO\F_controller_resource::F_CONTROLLER_RESOURCE_VALUE];
    }

    /**
     * Get the resource comment by module, action and key.
     * 
     * @param string $key the resource key to find
     * @return string the resource comment
     * @todo create a error code for exception
     */
    public function GetComment($key) {
        $resources = $this->GetList();
        $actionExists = array_key_exists($this->ActionValue, $resources);
        $keyExist = $actionExists ? array_key_exists($key, $resources[$this->ActionValue]) : false;

        if (!$actionExists) {
            $errMsg = "The resource comment doesn't exist for Module => " .
                    $this->ModuleValue . " and Action => " . $this->ActionValue;
            throw new \Library\Exceptions\ResourceNotFoundException($errMsg, 0, null);
        }
        if (!$keyExist) {
            $errMsg = "The resource comment doesn't exist for Module => " .
                    $this->ModuleValue . ", Action => " . $this->ActionValue . " and Key => " . $key;
            throw new \Library\Exceptions\ResourceNotFoundException($errMsg, 0, null);
        }

        return $resources[$this->ActionValue][$key][\Library\BO\F_controller_resource::F_CONTROLLER_RESOURCE_COMMENT];
    }

}
