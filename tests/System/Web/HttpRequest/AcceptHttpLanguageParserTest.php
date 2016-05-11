<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\AcceptHttpLanguageParser;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\RequestBase;
use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;
use Puzzlout\FrameworkMvc\Tests\MockingHelpers\UnitTestHelper;

class AcceptHttpLanguageParserTest extends \PHPUnit_Framework_TestCase {

    private $inputs;
    private $request;

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        $this->inputs = UnitTestHelper::validInputs();
        $this->request = new RequestBase($this->inputs);
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new AcceptHttpLanguageParser($this->request->serverContext());
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\AcceptHttpLanguageParser', $instance);
    }

    public function testInstanceWithInit() {
        $instance = AcceptHttpLanguageParser::init($this->request->serverContext());
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\HttpRequest\AcceptHttpLanguageParser', $instance);
        return $instance;
    }

    public function testGetRawValue() {
        $instance = $this->testInstanceWithInit();
        $this->assertNotEmpty($instance->getRawValue());
    }

    public function testGetRawValueFailsWhenAcceptHttpLangNotSet() {
        unset($this->inputs[ServerContext::INPUT_SERVER][ServerConst::HTTP_ACCEPT_LANGUAGE]);
        $request = new RequestBase($this->inputs);
        $instance = AcceptHttpLanguageParser::init($request->serverContext());
        try {
            $instance->getRawValue();
        } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
            $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\RuntimeException", $exc);
        }
    }

    public function testGetListLang() {
        $instance = $this->testInstanceWithInit();
        $this->assertCount(3, $instance->getListOfLang());
    }

    public function testGetFirstLang() {
        $instance = $this->testInstanceWithInit();
        $lang = $instance->getFirstLang();
        $this->assertNotEmpty($lang);
        $this->assertSame("fr", $lang);
    }

    //Write the next tests below...
}
