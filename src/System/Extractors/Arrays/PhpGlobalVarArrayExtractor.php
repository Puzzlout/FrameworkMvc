<?php

/**
 * Explicit class that reads the PHP global vars. See IPhpGlobalVarArrayExtractor interface.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package PhpGlobalVarArrayExtractor
 */

namespace Puzzlout\FrameworkMvc\System\Extractors\Arrays;

use Puzzlout\Exceptions\Classes\Core\InvalidArgumentException;
use Puzzlout\Exceptions\Codes;

class PhpGlobalVarArrayExtractor extends ArrayExtrator implements IPhpGlobalVarArrayExtractor {

    /**
     * Initialize the extractor.
     * @param string $source
     * @todo Type hint parameter in PHP7
     */
    public function __construct($source) {
        if (is_null($source) || empty($source)) {
            throw new InvalidArgumentException(
            '$source must be a non-empty string', Codes\LogicErrors::UNEXPECTED_VALUE, null);
        }
        $this->Source = $source;
    }

    /**
     * Initialize the extractor.
     * @param string $source
     * @return \Puzzlout\FrameworkMvc\System\Extractors\Arrays\PhpGlobalVarArrayExtractor
     */
    public function Init($source) {
        $instance = new PhpGlobalVarArrayExtractor($source);
        return $instance;
    }

    /**
     * Retrieve the source input array.
     */
    public function filterInputArray() {
        $this->TheArray = filter_input_array($this->Source);
    }

    /**
     * 
     * @return array
     */
    public function extractKeyValuePairs() {
        $resultList = [];
        foreach ($this->TheArray as $key => $value) {
            
        };
        return $resultList;
    }

}
