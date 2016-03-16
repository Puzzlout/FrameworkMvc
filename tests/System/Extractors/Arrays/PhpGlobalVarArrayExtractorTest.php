<?php

/**
 * 
 * @since Test Suite v1.2.0
 */

namespace Puzzlout\FrameworkMvc\Tests\System\Extractors\Arrays;

use Puzzlout\FrameworkMvc\System\Extractors\Arrays\PhpGlobalVarArrayExtractor;

class PhpGlobalVarArrayExtractorTest extends \PHPUnit_Framework_TestCase {
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
    $result = new PhpGlobalVarArrayExtractor(INPUT_COOKIE);
    $this->assertInstanceOf('Puzzlout\FrameworkMvc\System\Extractors\Arrays\PhpGlobalVarArrayExtractor', $result);
  }
  
  //Write the next tests below...
  
}