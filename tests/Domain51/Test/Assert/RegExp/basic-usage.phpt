--TEST--
Domain51_Test_Assert_RegExp verifies that the pattern PCRE pattern matches the value that is passed
in.  getStatus() returns true if the assertion is valid, while getMessage() returns an appropriate
message.
--FILE--
<?php
//BEGIN REMOVE
set_include_path(dirname(__FILE__) . '/../../../../../src/' .
                 PATH_SEPARATOR .
                 get_include_path()
                 );
// END REMOVE

require_once 'Domain51/Test/Assert/RegExp.php';

$valid = new Domain51_Test_Assert_RegExp('/\d/', 'ABCabc123');
assert('$valid->getStatus()');
echo $valid->getMessage() . "\n";

$not_valid = new Domain51_Test_Assert_RegExp('/\d/', 'ABCabc');
assert('!$not_valid->getStatus()');
echo $not_valid->getMessage() . "\n";
?>
===DONE===
--EXPECT--
pattern ['/\d/'] is contained in value ['ABCabc123']
pattern ['/\d/'] is not contained in value ['ABCabc']
===DONE===