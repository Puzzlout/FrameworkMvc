<?php

namespace Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers;

use Puzzlout\Exceptions\Classes\Core\LogicException;
use Puzzlout\Exceptions\Codes\LogicErrors;

/**
 * Base class for handling the resources
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ResourceBase
 */
abstract class ResxManagerBase {

    /**
     * Defines if the resources is a common resource or not. By default, it is true.
     * It becomes FALSE when the GroupValue is not specified.
     * @var bool
     */
    public $IsCommon = TRUE;

    /**
     * The value of the common resource group
     * @var string
     */
    public $Group;

    /**
     * The value of the controller resource
     * @var string 
     */
    public $Controller;

    /**
     * The value of the controller resource action
     * @var string 
     */
    public $Action;

    /**
     * The value is formatted as xx-XX
     * @var string 
     */
    public $CultureName;

    public function __construct() {
        
    }

    /**
     * 
     * @param associative array $params
     */
    public static function init(GetResxRequest $request) {
        if(is_null($request->getGroup()) && is_null($request->getController()) && is_null($request->getAction()))
        {
            $errMsg ="You must specify either the group or the couple module/action ". 
                    "in the GetResxRequest object parameter.";
            throw new LogicException($errMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        
        $this->CultureValue = $request->getCultureName();
        
        if (!is_null($request->getGroup())) {
            $this->GroupValue = $request->getGroup();
            $this->IsCommon = true;
            return $this;
        } 
        
        if (!is_null($request->getController() &&  !is_null($request->getAction()))) {
            $this->ModuleValue = $request->getController();
            $this->ActionValue = $request->getAction();
            $this->IsCommon = FALSE;
        }
        return $this;
    }

    /**
     * Computes the resource namespace from the context.
     * 
     * @param string $prefix The namespace prefix to the resource class.
     * @param string  $resourceKey The key to build the namespace from.
     * @return string The resource namespace.
     */
    protected function GetResourceNamespace($prefix, $resourceKey) {
        $resourceNamespace = $prefix . ucfirst(strtolower($resourceKey)) . "Resx_" . $this->CultureValue;
        return $resourceNamespace;
    }

}
