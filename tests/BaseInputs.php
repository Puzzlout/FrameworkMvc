<?php

namespace Puzzlout\FrameworkMvc\Tests;

class BaseInputs {

    public static function Get() {
        return [
            'APP_ALIAS' => "TestApp",
            'INPUT_POST' => '',
            'INPUT_GET' => [
                'test' => 'true'
            ],
            'INPUT_SESSION' => [],
            'INPUT_COOKIE' => [
                'install_cf8a908de948' => 'mt38dgq2vtuhlf19lq44oq2dq6',
                'PHPSESSID' => 'mlcca28m2190s4k7q1o91sdev1',
                'XDEBUG_SESSION' => 'nb',
            ],
            'INPUT_SERVER' => [
                'REDIRECT_STATUS' => '200',
                'HTTP_HOST' => 'myapps.local',
                'HTTP_CONNECTION' => 'keep-alive',
                'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'HTTP_UPGRADE_INSECURE_REQUESTS' => '1',
                'HTTP_USER_AGENT' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36',
                'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch',
                'HTTP_ACCEPT_LANGUAGE' => 'fr,en-US;q=0.8,en;q=0.6',
                'HTTP_COOKIE' => 'install_cf8a908de948=mt38dgq2vtuhlf19lq44oq2dq6; PHPSESSID=mlcca28m2190s4k7q1o91sdev1; XDEBUG_SESSION=nb',
                'PATH' => '/usr/bin:/bin:/usr/sbin:/sbin',
                'SERVER_SIGNATURE' => '',
                'SERVER_SOFTWARE' => 'Apache/2.2.29 (Unix) mod_wsgi/3.5 Python/2.7.10 PHP/5.6.10 mod_ssl/2.2.29 OpenSSL/0.9.8zg DAV/2 mod_fastcgi/2.4.6 mod_perl/2.0.9 Perl/v5.22.0',
                'SERVER_NAME' => 'myapps.local',
                'SERVER_ADDR' => '127.0.0.1',
                'SERVER_PORT' => '80',
                'REMOTE_ADDR' => '127.0.0.1',
                'DOCUMENT_ROOT' => 'Users/jl/Sites',
                'SERVER_ADMIN' => 'you@example.com',
                'SCRIPT_FILENAME' => '/Users/jl/Sites/EasyMvc/dispatcher.php',
                'REMOTE_PORT' => '49933',
                'REDIRECT_QUERY_STRING' => 'test=true',
                'REDIRECT_URL' => '/EasyMvc/WebIde/CreateFile',
                'GATEWAY_INTERFACE' => 'CGI/1.1',
                'SERVER_PROTOCOL' => 'HTTP/1.1',
                'REQUEST_METHOD' => 'GET',
                'QUERY_STRING' => 'test=true',
                'REQUEST_URI' => '/EasyMvc/WebIde/CreateFile?test=true',
                'SCRIPT_NAME' => '/EasyMvc/dispatcher.php',
                'PHP_SELF' => '/EasyMvc/dispatcher.php',
                'REQUEST_TIME_FLOAT' => 1459745113.04,
                'REQUEST_TIME' => 1459745113,
                'argv' => ['test=true'],
                'argc' => 1,
            ],
            'INPUT_ENV' => [
                'SHELL' => '/bin/bash',
                'TMPDIR' => '/var/folders/sc/w1thj9c56hd40gf8v80vxyhm0000gn/T/',
                'Apple_PubSub_Socket_Render' => '/private/tmp/com.apple.launchd.6PwuKi7qJK/Render',
                '__AUTHORIZATION' => 'auth 15',
                'USER' => 'jl',
                'SSH_AUTH_SOCK' => '/private/tmp/com.apple.launchd.K4q5SdtwvK/Listeners',
                '__CF_USER_TEXT_ENCODING' => '0x1F5:0x0:0x0',
                '_BASH_IMPLICIT_DASH_PEE' => '-p',
                'PATH' => '/usr/bin:/bin:/usr/sbin:/sbin',
                'PWD' => '/',
                'XPC_FLAGS' => '0x0',
                'XPC_SERVICE_NAME' => '0',
                'HOME' => '/Users/jl',
                'SHLVL' => '2',
                'LOGNAME' => 'jl',
                '_' => '/Applications/MAMP/Library/bin/httpd',
            ]
        ];
    }
}
