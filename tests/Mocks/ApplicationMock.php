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

namespace Puzzlout\FrameworkMvc\Tests\Mocks;

use Puzzlout\FrameworkMvc\System\Mvc\ApplicationBase;
use Puzzlout\FrameworkMvc\System\Mvc\ApplicationInterface;
use Puzzlout\FrameworkMvc\System\Mvc\FindControllerHelper;

class ApplicationMock extends ApplicationBase implements ApplicationInterface {

    public function init(\Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase $request) {
        $instance = new ApplicationMock($request);
        return $instance;
    }

    public function process() {
        parent::process();
        $targetController = FindControllerHelper::init("/path/to/controllers/folder", $this->Route);
        new $targetController($this->Request, $this->Route, $this->getCultureInfo());
    }
    public function execute() {
        
    }

}
