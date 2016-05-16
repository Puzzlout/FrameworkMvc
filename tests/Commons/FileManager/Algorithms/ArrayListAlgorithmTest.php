<?php

/**
 * @locked
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\Commons\FileManager\Algorithms;

use Puzzlout\FrameworkMvc\Commons\FileManager\Algorithms\ArrayListAlgorithm;

class ArrayListAlgorithmTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new ArrayListAlgorithm();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\Algorithms\ArrayListAlgorithm', $instance);
    }

    public function testInstanceWithInit() {
        $instance = ArrayListAlgorithm::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\Algorithms\ArrayListAlgorithm', $instance);
        return $instance;
    }

    //Write the next tests below...
    public function testExcludeList() {
        $this->assertCount(2, $this->testInstanceWithInit()->excludeList());
    }

    public function testExcludeListForTestSuite() {
        $this->assertCount(7, $this->testInstanceWithInit()->excludeListForTestSuite());
    }

}
