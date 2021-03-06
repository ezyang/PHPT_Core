--TEST--
The returned Result object has an exitcode property set to the exitcode from the
executed PHP script.
--SKIPIF--
<?php require dirname(__FILE__) . '/_skipif.inc'; ?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$filename = dirname(__FILE__) . '/foobar.php';
$random = rand(100, 200);
$code = "<?php exit({$random}); ?>";
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_WScriptShell($caller);
$result = $runner->run($filename);

echo $result->exitcode, PHP_EOL;
assert('$result->exitcode == $random');
?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECTREGEX--
[12][0-9]{2}
===DONE===
