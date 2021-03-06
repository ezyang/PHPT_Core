--TEST--
PHPT_Case::validate() will call validate() on the provided object
--ARGS--
--FILE--
<?php

require_once dirname(__FILE__) . '/../_setup.inc';

class FooBarValidator implements PHPT_Case_Validator {
    public function validate(PHPT_Case $case) {
        echo __METHOD__ . " was called", PHP_EOL;
    }
    
    public function is(PHPT_Case $case) { }
}

$case = new PHPT_Case(new PHPT_SectionList(), dirname(__FILE__) . '/fake-test-case.phpt');
$case->validate(new FooBarValidator());

?>
===DONE===
--EXPECT--
FooBarValidator::validate was called
===DONE===
