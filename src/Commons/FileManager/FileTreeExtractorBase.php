<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package BaseFileSearch
 */

namespace Puzzlout\FrameworkMvc\Commons\FileManager;

use Puzzlout\FrameworkMvc\Commons\Regex\RegexHelper;
use Puzzlout\Exceptions\Classes\Core\RuntimeException;
use Puzzlout\Exceptions\Classes\Core\InvalidArgumentException;
use Puzzlout\Exceptions\Codes\GeneralErrors;
use Puzzlout\Exceptions\Codes\LogicErrors;

abstract class FileTreeExtractorBase {

    const FILE_SYSTEM = "FILE_SYSTEM";
    const HASH_ARRAY = "HASH_ARRAY";
    
    /**
     * 
     * @var bool T
     */
    protected $resultForm;
    
    /**
     * The resulting array
     * @var array 
     */
    protected $result;

    public function __construct($resultForm) {
        if(empty($resultForm)) {
            $errMsg = "The Result form cannot be empty!";
            throw new InvalidArgumentException($errMsg, GeneralErrors::PARAMETER_VALUE_INVALID, null);
        }
        
        if(empty($resultForm)) {
            $errMsg = "The Result form must be a string!";
            throw new InvalidArgumentException($errMsg, GeneralErrors::PARAMETER_VALUE_INVALID, null);
        }
        
        if ($resultForm !== FileTreeExtractor::FILE_SYSTEM && $resultForm !== FileTreeExtractorBase::HASH_ARRAY) {
            $errMsg = "The result form can only be FILE_SYSTEM or HASH_ARRAY. Modify the inputs of FileTreeExtractor.";
            throw new RuntimeException($errMsg, LogicErrors::PARAMETER_VALUE_INVALID, null);
        }
        $this->result = [];
        $this->resultForm = $resultForm;
    }
    /**
     * Checks if the directory is valid.
     * 
     * @param string $directory
     * @throws RuntimeException When the directory given is not a directory.
     * @todo Add an error code for the is_dir check: IS_NOT_DIRECTORY to LogicErrors enum
     * @todo Add an error code for the !is_string check: DIR_MUST_BE_A_STRING to LogicErrors enum
     */
    protected function isDirectoryValid($directory) {
        if (!is_string($directory)) {
            $errMsg = $directory . " is not a string.";
            throw new RuntimeException($errMsg, LogicErrors::UNASSIGNED_ERROR);
        }
        if ((!is_dir($directory))) {
            $errMsg = $directory . " is not a directory.";
            throw new RuntimeException($errMsg, LogicErrors::UNASSIGNED_ERROR);
        }
    }

    /**
     * Checks if the algorithm is valid.
     * 
     * @param array $algorithm
     * @throws RuntimeException When the algorithm given is not an array
     * @todo Add an error code for the is_array check: IS_NOT_ARRAY to LogicErrors enum
     */
    protected function isAlgorithmValid($algorithm) {
        if (!is_array($algorithm)) {
            $errMsg = "Algorithm is not an array.";
            throw new RuntimeException($errMsg, LogicErrors::UNASSIGNED_ERROR);
        }
    }
    
    protected function doIncludeInResult($valueToCheck, $algorithmFilter) {
        if (is_null($valueToCheck)) {
            return false;
        }
        foreach ($algorithmFilter as $filter) {
            if (strcmp($valueToCheck, $filter) === 0) {
                return false;
            }
            if (RegexHelper::init($valueToCheck)->isMatch('`^' . $filter . '$`')) {
                return false;
            }
        }
        return true;
    }

}
