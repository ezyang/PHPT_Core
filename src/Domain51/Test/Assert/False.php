<?php

class Domain51_Test_Assert_False extends Domain51_Test_Assert_SingleValueAbstract
{
    protected $_value = null;
    protected $_message = 'value [%s] %s false';
    
    public function getStatus()
    {
        return $this->_value == false;
    }
    
    public function getName()
    {
        return 'assertFalse';
    }
}