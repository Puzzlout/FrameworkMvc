<?php

namespace Puzzlout\FrameworkMvc\System\Mvc;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\AcceptHttpLanguageParser;
use Puzzlout\FrameworkMvc\System\Globalization\CultureInfo;
/**
 * The abstract Application class with the default behavior.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ApplicationBase
 */
abstract class ApplicationBase implements ApplicationInterface {

    /**
     * The request object.
     * 
     * @var \Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase 
     */
    protected $Request;

    /**
     * The route matching the current request.
     * 
     * @var \Puzzlout\FrameworkMvc\System\Mvc\Route
     */
    protected $Route;

    /**
     * The constructor of the class.
     * 
     * @param \Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase $request
     */
    public function __construct(RequestBase $request) {
        $this->Request = $request;
    }

    /**
     * The child class must implement the method.
     */
    abstract public function init(RequestBase $request);

    public function process() {
        $router = new Router($this->Request);
        $this->Route = $router->findRoute();

        return $this;
    }

    /**
     * The child class must implement the method.
     */
    abstract public function execute();
    
    public function getCultureInfo() {
        $cultureName = 
                AcceptHttpLanguageParser
                ::init($this->Request->serverContext())
                ->getFirstLang();
        return new CultureInfo($cultureName);
    }
}
