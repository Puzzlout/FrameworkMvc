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

use Puzzlout\FrameworkMvc\Commons\Regex\RegexHelper;

class ArrayFilterFileSearch extends BaseFileSearch implements IRecursiveFileTreeSearch {

    /**
     * Builds the instance of class
     * 
     * @return \Puzzlout\FrameworkMvc\Commons\FileManager\ArrayFilterDirectorySearch
     */
    public static function init() {
        $instance = new ArrayFilterFileSearch();
        $instance->FileList = array();
        return $instance;
    }

    public function recursiveFileTreeScanOf($directory, $algorithmFilter) {
        $scanResult = scandir($directory);
        foreach ($scanResult as $key => $value) {
            $includeValueInResult = $this->doIncludeInResult($value, $algorithmFilter);
            $isValueADirectory = is_dir($directory . "/" . $value);

            if (!$includeValueInResult) {
                continue;
            }
            if ($isValueADirectory) {
                $this->recursiveFileTreeScanOf($directory . "/" . $value, $algorithmFilter);
                continue;
            }
            $this->addFileToResult($directory, $value);
        }
        return $this->FileList;
    }

    /**
     * Add a file to the result list in the proper subarray using the directory.
     * 
     * @param string $directory The directory where resides the file
     * @param string $file The file name
     */
    private function addFileToResult($directory, $file) {
        if (array_key_exists($directory, $this->FileList)) {
            array_push($this->FileList[$directory], $file);
            return;
        }
        //array_push($this->FileList, $directory);
        $this->FileList[$directory] = [$file];
    }

    private function doIncludeInResult($valueToCheck, $algorithmFilter) {
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
