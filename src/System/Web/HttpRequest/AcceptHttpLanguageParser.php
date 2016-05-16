<?php

namespace Puzzlout\FrameworkMvc\System\Web\HttpRequest;

use Puzzlout\FrameworkMvc\System\Web\HttpRequest\ServerContext;
use Puzzlout\FrameworkMvc\PhpExtensions\ServerConst;
use Puzzlout\Exceptions\Classes\Core\RuntimeException;
use Puzzlout\Exceptions\Codes\GeneralErrors;

/**
 * Class parses the ServerContext[“HTTP_ACCEPT_LANGUAGE”] value
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ClassName
 */
class AcceptHttpLanguageParser {

    private $ServerData;

    public function __construct(ServerContext $context) {
        $this->ServerData = $context->server();
    }

    public static function init(ServerContext $context) {
        $instance = new AcceptHttpLanguageParser($context);
        return $instance;
    }

    public function getRawValue() {
        if (!isset($this->ServerData[ServerConst::HTTP_ACCEPT_LANGUAGE])) {
            $errMsg = 'HTTP_ACCEPT_LANGUAGE was not found in $_SERVER variable.';
            throw new RuntimeException($errMsg, GeneralErrors::DEFAULT_ERROR, null);
        }

        $rawValue = $this->ServerData[ServerConst::HTTP_ACCEPT_LANGUAGE];
        return $rawValue;
    }

    public function getListOfLang() {
        $rawValue = $this->getRawValue();
        $languages = explode(",", $rawValue);
        $finalLanguages = [];
        foreach ($languages as $key => $languageWithQuality) {
            $languageQualityArray = explode(";", $languageWithQuality);
            array_push($finalLanguages, $languageQualityArray[0]);
        }
        return $finalLanguages;
    }

    public function getFirstLang() {
        $languages = $this->getListOfLang();
        if (count($languages) === 0) {
            
        }

        return $languages[0];
    }

}
