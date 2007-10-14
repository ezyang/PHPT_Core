<?php

class PHPT_Section_Expectregex extends PHPT_Section_ExpectationAbstract
{
    protected function _isValid(PHPT_Case $case)
    {
        $pattern = $this->_expected;
        if ($pattern[0] != '/') {
            $pattern = "/{$pattern}/";
        }
        
        // capture $matches - it'll still be NULL if $pattern was invalid
        $matches = null;
        $result = @preg_match($pattern, $case->output, $matches);
        if (is_null($matches)) {
            throw new PHPT_Section_Expectregex_InvalidRegexException($case, $pattern);
        }
        return $result;
    }
}
