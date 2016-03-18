<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Web;

use Puzzlout\FrameworkMvc\System\Web\WebClientData;

class WebClientDataTest extends \PHPUnit_Framework_TestCase {
    /**
     * Initialize the app object.
     */
    protected function setUp()
    {
        $_POST = ["test" => "test"];
        $_GET = ["test" => "test"];
        $_COOKIE = ["test" => "test"];
    }
  
    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect()
    {
        $result = new WebClientData();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\WebClientData', $result);
    }
  
    //Write the next tests below...
  
    public function testInstanceIsCorrectWithInit()
    {
        $result = WebClientData::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Web\WebClientData', $result);
    }
  
    public function testInstancePropertiesAreCorrect() {
        $instance = new WebClientData();
        $this->assertTrue(is_array($instance->InputPost()));
        $this->assertTrue(is_array($instance->InputGet()));
        $this->assertTrue(is_array($instance->Files()));
        $this->assertTrue(is_array($instance->Cookies()));
        $this->assertTrue(is_array($instance->Session()));
    }

    public function testInitInstancePropertiesAreCorrect() {
        $instance = WebClientData::init();
        $this->assertTrue(is_array($instance->InputPost()));
        $this->assertTrue(is_array($instance->InputGet()));
        $this->assertTrue(is_array($instance->Files()));
        $this->assertTrue(is_array($instance->Cookies()));
        $this->assertTrue(is_array($instance->Session()));
    }

    public function testFillWithInputPost() {
        $instance = new WebClientData();
        $result = $instance->fill(INPUT_POST);
        var_dump($result->InputPost());
        $this->assertTrue(is_array($result->InputPost()));
    }
    
    public function testFillWithInputGet() {
        $instance = new WebClientData();
        $result = $instance->fill(INPUT_GET);
        var_dump($result->InputGet());
        $this->assertTrue(is_array($result->InputGet()));
    }
    
    public function testFillWithFiles() {
        $instance = new WebClientData();
        $result = $instance->fillFiles();
        var_dump($result->Files());
        $this->assertTrue(is_array($result->Files()));
    }
    
    public function testFillWithCookies() {
        $instance = new WebClientData();
        $result = $instance->fill(INPUT_COOKIE);
        var_dump($result->Cookies());
        $this->assertTrue(is_array($result->Cookies()));
    }
    
    public function testFillWithSession() {
        $instance = new WebClientData();
        $result = $instance->fillSession();
        var_dump($result->Session());
        $this->assertTrue(is_array($result->Session()));
    }

}