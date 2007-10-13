--TEST--
current() always returns the exact same case
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

$data = array(
    dirname(__FILE__) . '/../_support/tests/hello-world.phpt',
);

$list = new PHPT_CaseList($data);
assert('$list->current() === $list->current()');

?>
===DONE===
--EXPECT--
===DONE===