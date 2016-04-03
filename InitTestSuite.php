<?php
include_once("vendor/autoload.php");

echo "REQUEST_URI = " . $_SERVER[Puzzlout\FrameworkMvc\PhpExtensions\ServerConst::REQUEST_URI];
echo "QUERY_STRING = " . $_SERVER[Puzzlout\FrameworkMvc\PhpExtensions\ServerConst::QUERY_STRING];

/**
 * You must change the following values according to your case.
 */
define("VENDOR", "Puzzlout");
define("PACKAGE", "FrameworkMvc");
$soureNamespacePrefix = VENDOR . "\\" . PACKAGE . "\\";
$testNamespacePrefix = VENDOR . "\\" . PACKAGE . "\\Tests";
/**
 * NO MODIFICATION ZONE (except if you take responsibility of your actions)
 */
define("ROOT_DIR", dirname(dirname(__FILE__)) . "/" . PACKAGE . "/");
define("TESTING_FILE_TREE", false);
define("SKIP_TEST_CLASSES_GENERATION", false);
define("OVERWRITE_TEST_SUITE", true);
define("PREVIOUS_TEST_SUITE_VERSION", "v1.1.0");
define("TEST_SUITE_VERSION", "v1.2.0");
use Puzzlout\Framework\GeneratorEngine\Core\InitializeTestSuite;
$additionalFilters = array("Views");
$TestSuite = InitializeTestSuite::init(
                $additionalFilters, $soureNamespacePrefix, $testNamespacePrefix)->processSourceFolder();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test Suite Generation</title>
        <style>
            * {
                margin: 0 !important;
            }
            p{
                padding: 10px 5px;
            }
            .exists {
                font-weight: bold;
                background-color: #EECE32;
                color: #000;
            }
            .not-created {
                font-weight: bold;
                background-color: #CB554A;
                color: #FFF;
            }
            .created {
                font-weight: bold;
                background-color: #8CC75A;
                color: #FFF;
            }
            .skipped {
                background-color: #FFC31E;
                color: #1F5AFF;
            }
            .test-class {
                margin-left: 1em;
                text-indent: 1em;
            }
        </style>
    </head>
    <body>
        <h1>Starting generation of testing suite (<?php echo TEST_SUITE_VERSION; ?>)...</h1>
        <?php echo $TestSuite->output; ?>
        <h1>End of generation.</h1>
    </body>
</html>