<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\Commons\Regex;

use Puzzlout\FrameworkMvc\Commons\Regex\RegexHelper;

class RegexHelperTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new RegexHelper("");
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\Regex\RegexHelper', $instance);
    }

    public function testInstanceWithInit() {
        $instance = RegexHelper::init("");
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\Regex\RegexHelper', $instance);
        return $instance;
    }

    //Write the next tests below...
    public function testIsAPhpFilenameIsTrue() {
        $valueToTest = "file.php";
        $this->assertTrue(RegexHelper::init($valueToTest)->isAPhpFilename());
    }

    public function testIsAPhpFilenameIsFalse() {
        $valueToTest = "file.txt";
        $this->assertFalse(RegexHelper::init($valueToTest)->isAPhpFilename());
    }

    public function testisMatchIsTrue() {
        $valueToTest = "text";
        $this->assertTrue(RegexHelper::init($valueToTest)->isMatch('`^text$`'));
    }

    public function testisMatchIsFalse() {
        $valueToTest = "file.txt";
        $this->assertFalse(RegexHelper::init($valueToTest)->isMatch('`^text$`'));
    }

    public function testIsResoureKeyValidIsTrue() {
        $valuesToTest = ["xx_xx", "xx_XX", "Xx_Xx", "xX_xX", "x1_X7"];
        foreach ($valuesToTest as $value) {
            $this->assertTrue(RegexHelper::init($value)->isResoureKeyValid());
        }
    }

    public function testIsResoureKeyValidIsFalse() {
        $valuesToTest = ["$", "a@", "z§-zz", "1)_12", "€"];
        foreach ($valuesToTest as $value) {
            $this->assertFalse(RegexHelper::init($value)->isResoureKeyValid());
        }
    }

    public function testStringContainsWhiteSpaceIsTrue() {
        $valueToTest = "text ";
        $this->assertTrue(RegexHelper::init($valueToTest)->stringContainsWhiteSpace());
    }

    public function testStringContainsWhiteSpaceIsFalse() {
        $valueToTest = "file.txt";
        $this->assertFalse(RegexHelper::init($valueToTest)->stringContainsWhiteSpace());
    }

    public function testSetValueToTest() {
        $value = "first";
        $instance = RegexHelper::init($value);
        $this->assertTrue($instance->isMatch('`first`'));
        $value = "second";
        $instance->setValueToTest($value);
        $this->assertTrue($instance->isMatch('`second`'));
    }
}
