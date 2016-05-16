<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package ArrayFilterFileSearch
 */

namespace Puzzlout\FrameworkMvc\Commons\FileManager;

use Puzzlout\Exceptions\Classes\Core\RuntimeException;
use Puzzlout\Exceptions\Codes\LogicErrors;

class FileTreeExtractor extends FileTreeExtractorBase implements IRecursiveFileTreeSearch {

    /**
     * Builds the instance of class
     * 
     * @return \Puzzlout\FrameworkMvc\Commons\FileManager\ArrayFilterDirectorySearch
     */
    public static function init($resultForm) {
        $instance = new FileTreeExtractor($resultForm);
        return $instance;
    }

    /**
     * Retrieve the list of files recursively in a given root directory applying the algorithm filters.
     * The result 
     * @param string $directory
     * @param array $algorithmFilter
     * @return array
     */
    public function retrieveList($directory, $algorithmFilter) {
        $this->isDirectoryValid($directory);
        $this->isAlgorithmValid($algorithmFilter);

        $scanResult = scandir($directory);
        foreach ($scanResult as $key => $file) {
            $includeValueFromResult = $this->doIncludeInResult($file, $algorithmFilter);
            $isValueADirectory = is_dir($directory . "/" . $file);

            if (!$includeValueFromResult) {
                continue;
            }

            if ($isValueADirectory) {
                $this->retrieveList($directory . "/" . $file, $algorithmFilter);
                continue;
            }

            if ($this->resultForm === FileTreeExtractor::FILE_SYSTEM) {
                $this->addToFileSystemFormResult($directory, $file);
                continue;
            }
            
            if ($this->resultForm === FileTreeExtractor::HASH_ARRAY) {
                $this->addToHashArrayFormResult($file);
                continue;
            }
        }
        return $this->result;
    }

    /**
     * Add a file to the result list in the proper subarray using the directory.
     * This method is used when the $resultForm equals FILE_SYSTEM.
     * 
     * @param string $directory The directory where resides the file
     * @param string $file The file name
     */
    protected function addToFileSystemFormResult($directory, $file) {
        if($this->resultForm !== FileTreeExtractor::FILE_SYSTEM) {
            $errMsg = "Call addToHashArrayFormResult function when expecting the file system form";
            throw new RuntimeException($errMsg, LogicErrors::UNASSIGNED_ERROR, null);
        }
        
        if (array_key_exists($directory, $this->result)) {
            array_push($this->result[$directory], $file);
            return;
        }

        $this->result[$directory] = [$file];
    }

    /**
     * Add a file to the result list in the proper subarray using the directory.
     * This method is used when the $resultForm equals HASH_ARRAY.
     * 
     * @param string $file The file name
     */
    protected function addToHashArrayFormResult($file) {
        if($this->resultForm !== FileTreeExtractor::HASH_ARRAY) {
            $errMsg = "Call addToFileSystemFormResult function when expecting the hash array form";
            throw new RuntimeException($errMsg, LogicErrors::UNASSIGNED_ERROR, null);
        }
        
        $fileHash = sha1($file);
        if (array_key_exists($fileHash, $this->result)) {
            return;
        }

        $this->result[$fileHash] = $file;
    }

}
