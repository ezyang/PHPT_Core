--TEST--
NotEqual assertion is named assertNotEqual
--FILE--
<?php

require dirname(__FILE__) . '/../_setup.inc';

$assertion = new Domain51_Test_Assert_NotEqual(true, false);
assert('$assertion->getName() == "assertNotEqual"');

?>
===DONE===
--EXPECT--
===DONE===