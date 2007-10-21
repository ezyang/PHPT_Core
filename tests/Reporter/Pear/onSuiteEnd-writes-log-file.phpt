--TEST--
When onCaseFailure() has been triggered, write the output generated by onSuiteEnd()
to a run-test.log file
--FILE--
<?php

require_once dirname(__FILE__) . '/_setup.inc';

$reporter = new PHPT_Reporter_Pear();
$suite = new PHPT_SimpleSuite();

// don't display output - we just want the file
ob_start();
$reporter->onSuiteStart($suite);

$case = new PHPT_SimpleTestCase();
$case->name = 'some random test';
$case->filename = '/path/to/foobar.phpt';

$reporter->onCaseStart($case);
$reporter->onCaseFail($case, new PHPT_SimpleFailureException());
$reporter->onCaseEnd($case);

$reporter->onSuiteEnd($suite);
ob_clean();

assert('file_exists("run-tests.log")');
echo file_get_contents('run-tests.log');

?>
===DONE===
--CLEAN--
<?php @unlink('run-tests.log'); ?>
--EXPECTF--
TOTAL TIME 00:0%d
0 PASSED TESTS
0 SKIPPED TESTS
1 FAILED TESTS:
/path/to/foobar.phpt
===DONE===
