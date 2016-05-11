<?php

namespace Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers;

use Puzzlout\FrameworkMvc\System\Globalization\CultureInfo;
use Puzzlout\Exceptions\Classes\Core\InvalidArgumentException;
use Puzzlout\Exceptions\Codes\LogicErrors;

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package GetResxRequest
 */
class GetResxRequest {

    const SOURCE_XML = 'FROM_XML';
    const SOURCE_DB = 'FROM_DB';
    const SOURCE_CLASS = 'FROM_CLASS';

    protected $Source;
    protected $Key;
    protected $Group;
    protected $Controller;
    protected $Action;
    protected $CultureName;

    public function __construct($source) {
        $this->Source = $source;
    }

    public static function init($source) {
        $obj = new GetResxRequest($source);
        return $obj;
    }

    public function setKey($key) {
        if (!is_string($key)) {
            $errMsg = 'Parameter $key must be a string.';
            throw new InvalidArgumentException($errMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        $this->Key = $key;
        return $this;
    }

    public function setGroup($group) {
        if (!is_string($group)) {
            $errMsg = 'Parameter $group must be a string.';
            throw new InvalidArgumentException($errMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        $this->Group = $group;
        return $this;
    }

    public function setController($controller) {
        if (!is_string($controller)) {
            $errMsg = 'Parameter $controller must be a string.';
            throw new InvalidArgumentException($errMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }

        $this->Controller = $controller;
        return $this;
    }

    public function setAction($action) {
        if (!is_string($action)) {
            $errMsg = 'Parameter $action must be a string.';
            throw new InvalidArgumentException($errMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }

        $this->Action = $action;
        return $this;
    }

    public function setCultureName(CultureInfo $cultureInfo) {
        $this->CultureName = $cultureInfo->getName();
        return $this;
    }

    public function getGroup() {
        return $this->Group;
    }

    public function getController() {
        return $this->Controller;
    }

    public function getAction() {
        return $this->Action;
    }

    public function getCultureName() {
        return $this->CultureName;
    }

}
