<?php

/**
 * Lists the shared regular expressions used in the Framework and Applications.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/EasyMvc
 * @since Version 1.0.0
 * @package CommonRegexes
 */

namespace Puzzlout\FrameworkMvc\Commons\Regex;

abstract class CommonRegexes {

    const SEARCH_WHITE_SPACE = "`\s`";
    const SEARCH_PHP_EXTENSION = "`^.*php$`";
    const RESOURCE_KEY_VALIDATION = "`^[a-zA-Z0-9_]+$`";
    const DIRECTORY_EXCLUDE_PATTERN = "`^([^\.0-9])+([\.\w_-])+$`";
    const IS_CLASS_ABSCTRACT = "`(abstract class )`";
    const IS_FILE_INTERFACE = "`(interface )`";
    const CONTAINS_LOCKED_FLAG = "`(@locked)`";

}
