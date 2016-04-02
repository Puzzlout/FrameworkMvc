<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\Commons\Validation;

use Puzzlout\FrameworkMvc\Commons\Validation\StringValidator;

class StringValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $result = new StringValidator("");
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\Validation\StringValidator', $result);
    }

    public function testInstanceWithInit() {
        $instance = StringValidator::init("");
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\Validation\StringValidator', $instance);
        return $instance;
    }

    public function testIsNullOrEmptyWithEmptyValue() {
        $this->assertTrue($this->testInstanceWithInit()->IsNullOrEmpty());
    }

    public function testIsNullOrEmptyWithNullValue() {
        $instance = StringValidator::init(null);
        $this->assertTrue($instance->IsNullOrEmpty());
    }

    public function testIsNullOrEmptyWithValue() {
        $instance = StringValidator::init("test");
        $this->assertFalse($instance->IsNullOrEmpty());
    }

    public function testIsNullOrEmptyWithValueEqualsNull() {
        $instance = StringValidator::init("null");
        $this->assertFalse($instance->IsNullOrEmpty());
    }

    //Write the next tests below...
}
