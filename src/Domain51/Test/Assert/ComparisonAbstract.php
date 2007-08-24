<?php

require_once 'Domain51/Test/Assertion.php';
require_once 'Domain51/Test/Util/ValueDumper.php';

abstract class Domain51_Test_Assert_ComparisonAbstract implements Domain51_Test_Assertion
{
    protected $_one = null;
    protected $_two = null;
    protected $_message = '';
    
    /**
     * Use the integer value of getStatus() to determine which value to use
     *
     * @var array
     */
    protected $_comparison = array(
        0 => 'are not',
        1 => 'are'
    );
    
    public function __construct($one, $two, $message = null)
    {
        $this->_one = $one;
        $this->_two = $two;
        
        if (!is_null($message)) {
            $this->_message = $message;
        }
    }
    
    public function getMessage()
    {
        $status = $this->getStatus();
        return sprintf(
            $this->_message,
            (string)new Domain51_Test_Util_ValueDumper($this->_one),
            (string)new Domain51_Test_Util_ValueDumper($this->_two),
            $status ? $this->_comparison[(int)$status] : $this->_comparison[(int)$status]
        );
    }
}