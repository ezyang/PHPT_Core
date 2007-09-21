<?php

class Domain51_Test_Case_Parser
{
    public function __construct()
    {
        
    }
    
    public function parse($file)
    {
        $sections = array();
        $lines = file($file);
        $current_section = null;
        foreach ($lines as $line) {
            if (preg_match('/^--([^-]+)--$/', $line, $matches)) {
                $current_section = $matches[1];
                $sections[$current_section] = array();
                continue;
            }
            
            if (is_null($current_section)) {
                // nothing to do here yet
                continue;
            }
            
            $sections[$current_section][] = $line;
        }
        
        if (!isset($sections['TEST'])) {
            throw new Domain51_Test_Case_Parser_InvalidTestCaseException('missing TEST section');
        }
        
        if (!isset($sections['FILE'])) {
            throw new Domain51_Test_Case_Parser_InvalidTestCaseException('missing FILE section');
        }
        
        $test_case_file = dirname($file) . '/' . basename($file, '.phpt') . '.php';
        
        $name = trim(implode("\n", $sections['TEST']));
        return new Domain51_Test_Case($name, $test_case_file, $sections['FILE'], $sections);
    }
}

class Domain51_Test_Case_Parser_InvalidTestCaseException extends Exception { }