<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Globalization\ResourceManagers;

use Puzzlout\FrameworkMvc\Tests\Mocks\ResxManagerBaseMock;
use Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers\GetResxRequest;
use Puzzlout\FrameworkMvc\System\Globalization\CultureInfo;

class ResxManagerBaseMockTests extends \PHPUnit_Framework_TestCase {

    private $getResxRequest;
    private $cultureInfo;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->cultureInfo = new CultureInfo("fr-FR");
        $this->getResxRequest = GetResxRequest::init(GetResxRequest::SOURCE_CLASS)
                ->setController("controller")
                ->setAction("action")
                ->setCultureName($this->cultureInfo);
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new ResxManagerBaseMock($this->getResxRequest);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Tests\Mocks\ResxManagerBaseMock', $instance);
        return $instance;
    }

    //Write the next tests below...
    
    public function testInstanciationFailBecauseGetResxRequestEmpty() {
        $request = new GetResxRequest(GetResxRequest::SOURCE_CLASS);
        try {
            $instance = new ResxManagerBaseMock($request);
        } catch (\Puzzlout\Exceptions\Classes\Core\LogicException $exc) {
            $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\LogicException", $exc);
        }
    }
    public function testInstanceIsCorrectWithGroupSet() {
        $request = GetResxRequest::init(GetResxRequest::SOURCE_CLASS)
            ->setGroup("group")
            ->setCultureName($this->cultureInfo);
        $instance = new ResxManagerBaseMock($this->getResxRequest);
        $this->assertSame($instance->Group, "group");
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Tests\Mocks\ResxManagerBaseMock', $instance);
        return $instance;
    }
}
