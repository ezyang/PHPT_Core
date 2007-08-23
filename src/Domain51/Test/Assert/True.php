<?php

require_once 'Domain51/Test/Assertion.php';

class Domain51_Test_Assert_True implements Domain51_Test_Assertion
{
    private $_message = 'value [%s] %s true';
    private $_value = null;
    
    public function __construct($value, $message = null)
    {
        $this->_value = $value;
        if (!is_null($message)) {
            $this->_message = $message;
        }
    }
    
    public function getStatus()
    {
        return $this->_value == true;
    }
    
    public function getMessage()
    {
        return sprintf(
            $this->_message,
            var_export($this->_value, true),
            $this->getStatus() ? 'is' : 'is not'
        );
    }
}