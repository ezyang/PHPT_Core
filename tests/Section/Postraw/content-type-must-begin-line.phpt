--TEST--
The term "Content-Type:" must be the first characters in the line in order to
trigger setting a custom content-type.
--FILE--
<?php

require_once dirname(__FILE__) . '/../../_setup.inc';

$post_data = ' Content-Type: not set';
$env = new PHPT_Section_Env();
$post = new PHPT_Section_Postraw($post_data);
$post->modifyEnv($env);
echo $env->data['CONTENT_TYPE'], "\n";

?>
===DONE===
--EXPECT--
application/x-www-form-urlencoded
===DONE===
