--TEST--
PHPT_Section_SKIPIF implements PHPT_Section_Runnable
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_SKIPIF('');
assert('$section instanceof PHPT_Section_Runnable');

?>
===DONE===
--EXPECT--
===DONE===
