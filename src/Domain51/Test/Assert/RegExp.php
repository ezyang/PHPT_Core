<?php

require_once 'Domain51/Test/Assertion.php';

class Domain51_Test_Assert_RegExp implements Domain51_Test_Assertion
{
    private $_pattern = null;
    private $_value = null;
    private $_message = 'pattern [%1$s] %3$s contained in value [%2$s]';
    
    protected $_comparison = array(
        0 => 'is not',
        1 => 'is',
    );
    
    public function __construct($pattern, $value, $message = null)
    {
        $this->_pattern = $pattern;
        $this->_value = $value;
        
        if (!is_null($message)) {
            $this->_message = $message;
        }
    }
    
    public function getStatus()
    {
        return preg_match($this->_pattern, $this->_value);
    }
    
    public function getMessage()
    {
        $status = $this->getStatus();
        return sprintf(
            $this->_message,
            $this->_exportPattern(),
            var_export($this->_value, true),
            $this->_comparison[(int)$status]
        );
    }
    
    private function _exportPattern()
    {
        return stripslashes(
            var_export(
                $this->_pattern,
                true
            )
        );
    }
}