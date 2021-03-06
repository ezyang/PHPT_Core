--TEST--
When the regex pattern provided is invalid, a PHPT_Section_EXPECTREGEX_InvalidRegexException
will be thrown
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';
require_once dirname(__FILE__) . '/../_simple-test-case.inc';

$case = new PHPT_SimpleTestCase();
$case->output = 'foobar';

$section = new PHPT_Section_EXPECTREGEX('/no ending delimiter');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_EXPECTREGEX_InvalidRegexException $e) {
    echo $e->getMessage(), PHP_EOL;
}

$section = new PHPT_Section_EXPECTREGEX('no beginng delimiter/');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_EXPECTREGEX_InvalidRegexException $e) {
    echo $e->getMessage(), PHP_EOL;
}

$section = new PHPT_Section_EXPECTREGEX('/unknown /Q modifier/');
try {
    $section->run($case);
    trigger_error('exception not caught');
} catch (PHPT_Section_EXPECTREGEX_InvalidRegexException $e) {
    echo $e->getMessage(), PHP_EOL;
}

?>
===DONE===
--EXPECT--
invalid regex in EXPECTREGEX: No ending delimiter '/' found
invalid regex in EXPECTREGEX: Unknown modifier '/'
invalid regex in EXPECTREGEX: Unknown modifier 'Q'
===DONE===
