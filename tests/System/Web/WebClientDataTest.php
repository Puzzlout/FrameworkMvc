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
        $_POST = array("testPost" => "test");
        $_GET = array("testGet" => "test");
        $_COOKIE = array("testCookie" => "test");
        $_FILES = array("testFiles" => "test");
        $_SESSION = array("testSession" => "test");
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

    public function testFillPost() {
        $instance = new WebClientData();
        $result = $instance->fillPost();
        var_dump($result->InputPost());
        var_dump($_POST);
        var_dump(filter_input_array(INPUT_POST));
        $this->assertTrue(is_array($result->InputPost()));
    }
    
    public function testFillGet() {
        $instance = new WebClientData();
        $result = $instance->fillGet();
        //var_dump($result->InputGet());
        $this->assertTrue(is_array($result->InputGet()));
    }
    
    public function testFillFiles() {
        $instance = new WebClientData();
        $result = $instance->fillFiles();
        //var_dump($result->Files());
        $this->assertTrue(is_array($result->Files()));
    }
    
    public function testFillCookies() {
        $instance = new WebClientData();
        $result = $instance->fillCookies();
        //var_dump($result->Cookies());
        $this->assertTrue(is_array($result->Cookies()));
    }
    
    public function testFillSession() {
        $instance = new WebClientData();
        $result = $instance->fillSession();
        //var_dump($result->Session());
        $this->assertTrue(is_array($result->Session()));
    }

}