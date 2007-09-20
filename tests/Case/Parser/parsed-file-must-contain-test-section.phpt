--TEST--
If no '--TEST--' section is present, an exception is thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$test_file = dirname(__FILE__) . '/missing-test-section.phpt';
copy($test_file . '-', $test_file);

$parser = new Domain51_Test_Case_Parser();
try {
    $parser->parse($test_file);
    trigger_error('exception not caught');
} catch (Domain51_Test_Case_Parser_InvalidTestCaseException $e) {
    assert('$e->getMessage() == "missing TEST section"');
}


?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/missing-test-section.phpt'); ?>
--EXPECT--
===DONE===