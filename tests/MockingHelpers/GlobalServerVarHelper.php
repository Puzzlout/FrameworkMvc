<?php

/**
 * This class is a helper for mocking data for $_SERVER.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package GlobalServerVarHelper
 */

namespace Puzzlout\FrameworkMvc\Tests\MockingHelpers;

use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;

class GlobalServerVarHelper {

    public static function serverVarWithValidRequestUri() {
        return [
            ServerConst::REQUEST_URI => "/FrameworkMvc/InitTestSuite.php?XDEBUG_SESSION_START=nb",
            ServerConst::HTTP_HOST => "www.example.com",
            ServerConst::REQUEST_METHOD => "GET",
        ];
    }

    public static function serverVarWithInvalidRequestUri() {
        return [
            ServerConst::REQUEST_URI => "",
            ServerConst::HTTP_HOST => "example",
            ServerConst::REQUEST_METHOD => "",
        ];
    }

}
