<?php

/**
 * 
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package ResxManagerBaseMock
 */

namespace Puzzlout\FrameworkMvc\Tests\Mocks;

use Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers\ResxManagerBase;
use Puzzlout\FrameworkMvc\System\Globalization\ResourceManagers\GetResxRequest;

class ResxManagerBaseMock extends ResxManagerBase {

    public function __construct(GetResxRequest $request) {
        parent::__construct($request);
    }

    protected function getResourceNamespace($prefix, $resourceKey) {
        return parent::getResourceNamespace($prefix, $resourceKey);
    }

}
