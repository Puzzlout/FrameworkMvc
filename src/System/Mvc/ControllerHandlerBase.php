<?php

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\Exceptions\Codes\GeneralErrors;
use Puzzlout\Exceptions\Codes\MvcErrors;
use Puzzlout\Framework\Core\Context;
use Puzzlout\Framework\Core\Router;

/**
 * Base controller to handle request and response from a web browser.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package BaseController
 */
abstract class ControllerHandlerBase {

    protected $CultureInfo;
    protected $ServerContext;
    protected $ClientContext;
    protected $Response;
    protected $ViewModel;

    /**
     * Instantiate the class.
     * 
     * @param \Puzzlout\Framework\Core\Application $app The application object
     * @param string $controller The current controller
     * @param string $action The current action
     */
    public function __construct(\Puzzlout\Framework\Core\Application $app, $controller, $action) {
        parent::__construct($app);
        $this->managers = $app->dal();
        $this->Page = new \Puzzlout\Framework\Core\Page($app);
        $this->setController($controller);
        $this->setAction($action);
    }

    public function FillInstance() {
        $this->viewModel = new \Puzzlout\Framework\ViewModels\BaseVm($this->app);
        $this->setView();
        $this->setDataPost(\Puzzlout\Framework\Core\Request::Init($this->app)->retrievePostAjaxData(false));
        $this->setUploadingFiles();
    }

    /**
     * Execute the Controller action.
     * 
     * @return \Puzzlout\Framework\ViewModels\BaseVm The output View Model
     * @throws \RuntimeException Handle the non-existing action in the current controller
     */
    public function execute() {
        $action = $this->action();
        if (!is_callable(array($this, $action))) {
            $errorMessage = 'The action <b>' .
                    $this->action .
                    '</b> is not defined for the module <b>' .
                    ucfirst($this->module) .
                    '</b>';
            throw new \RuntimeException($errorMessage, MvcErrors::ACTION_NOT_FOUND_FOR_CONTROLLER, null);
        }
        $logGuid = \Puzzlout\Framework\Utility\TimeLogger::StartLogInfo(
                        $this->app(), get_class($this) . "->" . ucfirst($action));
        $viewModelObject = $this->$action();
        \Puzzlout\Framework\Utility\TimeLogger::EndLog($this->app(), $logGuid);
        return $viewModelObject;
    }

    public function setController($controller) {
        if (!is_string($controller) || empty($controller)) {
            $errMessage = "The module value must be a string and not be empty";
            throw new \InvalidArgumentException($errMessage, GeneralErrors::VALUE_IS_NOT_OF_EXPECTED_TYPE);
        }

        $this->Controller = $controller;
    }

    public function setAction($action) {
        if (!is_string($action) || empty($action)) {
            $errMessage = "The action value must be a string and not be empty";
            throw new \InvalidArgumentException($errMessage, GeneralErrors::VALUE_IS_NOT_OF_EXPECTED_TYPE);
        }

        $this->Action = $action;
    }

    public function setView() {
        if (!is_string($this->action) || empty($this->action)) {
            $errMessage = 'The action value must be a string and not be empty';
            throw new \InvalidArgumentException($errMessage, GeneralErrors::VALUE_IS_NOT_OF_EXPECTED_TYPE);
        }
        if (\Puzzlout\Framework\Core\Request::Init($this->app)->IsPost()) {
            //No view needed for Ajax calls.
            return;
        }
        $this->view = \Puzzlout\Framework\Core\ViewLoader::Init($this)->GetView();
        $this->page->setContentFile($this->view);
    }

    /**
     * Add the context the variables that are used to generated the output from the Views.
     */
    public function AddGlobalAppVariables() {
        $context = new Context($this->app);
        $culture = $context->GetCultureLang() . "_" . $context->GetCultureRegion();
        $this->page()->addVar('culture', $culture);
        $user = $this->app()->user->getAttribute(\Puzzlout\Framework\Enums\SessionKeys::UserConnected);
        $this->page()->addVar('user', $user[0]);
        $this->page()->addVar(Router::CurrentRouteVarKey, Router::Init($this->app)->currentRoute());
    }

    /**
     * Add to the page object the common variables to use in the views
     * 
     * Variables: none yet
     */
    protected function AddCommonVarsToPage() {
        
    }

}
