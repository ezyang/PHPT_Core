--TEST--
PHPT_Section_SKIPIF implements PHPT_Section
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new PHPT_Section_SKIPIF('');
assert('$section instanceof PHPT_Section');

?>
===DONE===
--EXPECT--
===DONE===
