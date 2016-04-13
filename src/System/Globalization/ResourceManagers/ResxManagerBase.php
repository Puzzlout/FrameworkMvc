<?php

namespace Puzzlout\FrameworkMvc\System\Globalization;

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
     * The value of the controller resource module
     * @var string 
     */
    public $Module;

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
        $this->CultureValue = $params[self::CultureKey];
        if (is_array($params) && array_key_exists(self::GroupKey, $params)) {
            $this->GroupValue = $params[self::GroupKey];
        } elseif (is_array($params) && (array_key_exists(self::ModuleKey, $params) && array_key_exists(self::ActionKey, $params))) {
            $this->ModuleValue = $params[self::ModuleKey];
            $this->ActionValue = $params[self::ActionKey];
            $this->IsCommon = FALSE;
        } else {
            throw new Exception("You must specify either the group or the couple module/action.", 0, NULL); //todo: create error code
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
