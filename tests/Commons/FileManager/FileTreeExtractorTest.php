<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\Commons\FileManager;

use Puzzlout\FrameworkMvc\Commons\FileManager\FileTreeExtractor;
use Puzzlout\FrameworkMvc\Commons\DirectoryHelper;
use Puzzlout\FrameworkMvc\Commons\FileManager\Algorithms\ArrayListAlgorithm;

class FileTreeExtractorTest extends \PHPUnit_Framework_TestCase {

    /**
     * Initialize the app object.
     */
    protected function setUp() {
        
    }

    /**
     * This method is generated.
     */
    public function testInstanceIsCorrect() {
        $instance = new FileTreeExtractor(FileTreeExtractor::FILE_SYSTEM);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\FileTreeExtractor', $instance);
    }

    public function testInstanceWithInit() {
        $instance = FileTreeExtractor::init(FileTreeExtractor::FILE_SYSTEM);
        $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\FileTreeExtractor', $instance);
        return $instance;
    }

    //Write the next tests below...
    public function testRetrieveListInFileSystemForm() {
        $directory = DirectoryHelper::init()->rootDir() . "/../testdata/TestDirectoryToScan";
        $filter = ArrayListAlgorithm::ExcludeList();
        $files = FileTreeExtractor::init(FileTreeExtractor::FILE_SYSTEM)->retrieveList($directory, $filter);
        var_dump($files);
        $this->assertTrue(3 === count($files));
    }

    public function testRetrieveListInHashArrayForm() {
        $directory = DirectoryHelper::init()->rootDir() . "/../testdata/TestDirectoryToScan";
        $filter = ArrayListAlgorithm::ExcludeList();
        $files = FileTreeExtractor::init(FileTreeExtractor::HASH_ARRAY)->retrieveList($directory, $filter);
        var_dump($files);
        $this->assertTrue(5 === count($files));
    }

    public function testRecursiveFileTreeScanWhenDirIsInvalid() {
        $invalidDirs = [1, [], "", 1.21, false, true];
        foreach ($invalidDirs as $directory) {
            try {
                FileTreeExtractor::init(FileTreeExtractor::HASH_ARRAY)->retrieveList($directory, []);
            } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
                $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\RuntimeException", $exc);
            }
        }
    }
    

}
