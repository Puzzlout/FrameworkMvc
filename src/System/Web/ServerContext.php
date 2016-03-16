<?php

/**
 * The class stores the $_SERVER and $_ENV arrays data.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2016
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/FrameworkMvc
 * @since Version 1.0.0
 * @package ServerContext
 */

namespace Puzzlout\FrameworkMvc\System\Web;

use Puzzlout\Objects\Types\KeyValuePair;

class ServerContext {

    /**
     * The list of data item found in $_SERVER stored as key value pairs.
     * @var array of Puzzlout\Objects\Types\KeyValuePair
     */
    public $Server;
    
    /**
     * The list of data item found in $_ENV stored as key value pairs.
     * @var array of Puzzlout\Objects\Types\KeyValuePair 
     */
    public $Environment;
}
