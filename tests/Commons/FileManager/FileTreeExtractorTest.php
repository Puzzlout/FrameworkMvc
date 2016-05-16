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
  protected function setUp()
  {
  }
  
  /**
   * This method is generated.
   */
  public function testInstanceIsCorrect()
  {
    $instance = new FileTreeExtractor(FileTreeExtractor::FILE_SYSTEM);
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\FileTreeExtractor', $instance);
  }
  
  public function testInstanceWithInit() {
      $instance = FileTreeExtractor::init(FileTreeExtractor::FILE_SYSTEM);
      $this->assertInstanceOf('Puzzlout\FrameworkMvc\Commons\FileManager\FileTreeExtractor', $instance);
      return $instance;
  }

  
  //Write the next tests below...
    public function testRecursiveFileTreeScanReturnListOfFiles() {
        $directory = DirectoryHelper::init()->rootDir . dirname(__FILE__) . "/TestDirectoryToScan";
        $filter = \Puzzlout\Framework\Core\DirectoryManager\Algorithms\ArrayListAlgorithm::ExcludeList();
        $files = FileTreeExtractor::init(FileTreeExtractor::FILE_SYSTEM)->retrieveList($directory, $filter);
        var_dump($files);
    }

    public function testRecursiveFileTreeScanWhenDirIsInvalid() {
        $invalidDirs = [1, [], "", 1.21, false, true];
        foreach ($invalidDirs as $directory) {
            try {
                
            } catch (\Puzzlout\Exceptions\Classes\Core\RuntimeException $exc) {
                $this->assertInstanceOf("Puzzlout\Exceptions\Classes\Core\RuntimeException", $exc);
            }
        }
    }
}