--TEST--
PHPT_Section_Expectf_UnexpectedOutputException is a subclass of PHPT_Case_FailureException
--FILE--
<?php

require_once dirname(__FILE__) . '/../../../_setup.inc';

$reflection = new ReflectionClass('PHPT_Section_Expectf_UnexpectedOutputException');
assert('$reflection->isSubClassof("PHPT_Case_FailureException")');

?>
===DONE===
--EXPECT--
===DONE===