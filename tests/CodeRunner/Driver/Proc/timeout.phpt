--TEST--
The $timeout property allows you to set how long you want to wait for the
running code to completely execute.
--SKIPIF--
<?php 
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
    echo 'skip - proc_get_status() is broken on Windows';
}
?>
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$random = rand(1, 2);
$filename = dirname(__FILE__) . '/foobar.php';
$code = "<?php sleep(" . ($random + 1) . "); ?>";
file_put_contents($filename, $code);

$caller = new PHPT_CodeRunner();
$runner = new PHPT_CodeRunner_Driver_Proc($caller);
$runner->timeout = $random;
try {
    $r = $runner->run($filename);
    trigger_error('exception not caught');
} catch (PHPT_CodeRunner_TimeoutException $e) {
    assert('$e->getMessage() == "code execution timed out"');
    assert('$e->getCause() === $caller');
}

?>
===DONE===
--CLEAN--
<?php @unlink(dirname(__FILE__) . '/foobar.php'); ?>
--EXPECT--
===DONE===
