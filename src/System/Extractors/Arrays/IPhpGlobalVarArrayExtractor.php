<?php

/**
 * IPhpGlobalVarArrayExtractor is the interface used to read the PHP global variables like $_POSt, $_GET, $_SERVER, etc.
 * 
 * First, we initialize the extractor by defining the source of the array.
 * Second, we need to extract the array from the source global variable using filter_input_array function
 * Third, we need to loop throught the array of the global variable read.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package IGlobalVarArrayExtractor
 */

namespace Puzzlout\FrameworkMvc\System\Extractors\Arrays;

interface IPhpGlobalVarArrayExtractor {

    /**
     * Initialize the extractor.
     * @return Puzzlout\FrameworkMvc\System\Extractors\Arrays\IPhpGlobalVarArrayExtractor The object where the data to 
     * process will be.
     */
    public function Init($source);
    
    /**
     * Retrieves the input array to process.
     * @return array The array.
     */
    public function filterInputArray();
    
    /**
     * Retrieve the key/value pairs from the source array.
     * @return array List of Puzzlout\Objects\Types\KeyValuePair objects
     */
    public function extractKeyValuePairs();
}
