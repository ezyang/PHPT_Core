--TEST--
When Section_EXPECT fails, it should write a .exp file with the expected outcome.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$basename = 'fake-test-case' . rand(100, 200);
$filename = dirname(__FILE__) . "/{$basename}.phpt";
$exp_filename = $filename . '.exp';

// clean up in case its left over
@unlink($exp_filename);

$case = new PHPT_SimpleTestCase();
$case->filename = $filename;
$case->output = 'bar';

$expect_data = "foo: " . rand(100, 200);
$expect = new PHPT_Section_EXPECT($expect_data);
try {
    $expect->run($case);
} catch (PHPT_Section_EXPECT_UnexpectedOutputException $e) {
    assert('file_exists($exp_filename)');
    assert('trim(file_get_contents($exp_filename)) == $expect_data');
}

?>
===DONE===
--CLEAN--
<?php $base = 'fake-test-case'; include dirname(__FILE__) . '/_clean.inc'; ?>
--EXPECT--
===DONE===
