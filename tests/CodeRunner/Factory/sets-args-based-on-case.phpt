--TEST--
The returned Domain51_Test_CodeRunner has its $args property set based on the
Test_Case's (string)sections->ARGS value.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/_foobar-sections.inc';

class FoobarTestCase extends Domain51_Test_Case
{
    public $sections = null;
    
    public function __construct() {
        $this->sections = new FoobarSections();
        $this->sections->ARGS = ' -- -foo=bar ';
    }
    
    public function __destruct() { }
}

$case = new FoobarTestCase();

$runner = Domain51_Test_CodeRunner_Factory::factory($case);
assert('$runner->args == (string)$case->sections->ARGS');

?>
===DONE===
--EXPECT--
===DONE===