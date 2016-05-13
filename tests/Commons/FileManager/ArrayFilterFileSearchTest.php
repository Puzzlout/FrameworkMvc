<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\Commons\FileManager;

use Puzzlout\FrameworkMvc\Commons\FileManager\ArrayFilterFileSearch;
use Puzzlout\FrameworkMvc\Commons\FileManager\Algorithms\ArrayListAlgorithm;

class ArrayFilterFileSearchTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new ArrayFilterFileSearch();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\ArrayFilterFileSearch', $instance);
    }

    public function testInstanceWithInit() {
        $instance = ArrayFilterFileSearch::init();
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\ArrayFilterFileSearch', $instance);
        return $instance;
    }

    //Write the next tests below...
    public function testRecursiveFileTreeScanOfReturnListOfFiles() {
        $instance = $this->testInstanceWithInit();
        $directory = dirname(dirname(dirname(__FILE__))) . "/TestDirectoryToScan";
        $files = $instance->recursiveFileTreeScanOf($directory, ArrayListAlgorithm::init()->excludeList());
        $this->assertTrue(count($files) === 4);
    }

    public function testRecursiveFileTreeScanOfWhenDirIsInvalid() {
        $instance = $this->testInstanceWithInit();
        $invalidDirs = [1, [], "", 1.21, false, true];
        foreach ($invalidDirs as $directory) {
            try {
                $instance->recursiveFileTreeScanOf($directory, ArrayListAlgorithm::init()->excludeList());
            } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
                $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\RuntimeException", $exc);
            }
        }
    }

}
