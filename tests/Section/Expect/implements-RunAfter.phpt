--TEST--
Domain51_Test_Section_Expect implements Domain51_Test_Section_RunAfter 
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$section = new Domain51_Test_Section_Expect('');
assert('$section instanceof Domain51_Test_Section_RunAfter');

?>
===DONE===
--EXPECT--
===DONE===