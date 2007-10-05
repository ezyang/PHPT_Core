<?php

abstract class PHPT_CodeRunner_Abstract
{
    protected $_caller = null;
    
    public $executable = 'php';
    public $environment = array();
    public $timeout = 60;
    public $ini = null;
    public $stdin = null;
    public $args = null;
    public $filename = null;
    
    public function __construct(PHPT_CodeRunner $caller)
    {
        $this->_caller = $caller;
    }
    
    abstract public function run($filename);
}