--TEST--
PHPT_Section_ENV implements PHPT_Section_Runnable
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('PHPT_Section_ENV');
assert('$reflection->implementsInterface("PHPT_Section_Runnable")');

?>
===DONE===
--EXPECT--
===DONE===
