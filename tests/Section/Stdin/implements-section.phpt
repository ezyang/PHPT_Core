--TEST--
Domain51_Test_Section_Stdin implements Domain51_Test_Section
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
$reflection = new ReflectionClass('Domain51_Test_Section_Stdin');
assert('$reflection->implementsInterface("Domain51_Test_Section")');

?>
===DONE===
--EXPECT--
===DONE===