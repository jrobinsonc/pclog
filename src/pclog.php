<?php

namespace jrdev;

class PCLog
{
    private $pc_conn;
    private $pc_instance;
    private $password;

    public function __construct($password = null) {
        $this->init($password);
    }

    public function init($password = null)
    {
        $this->password = $password;

        $this->pc_conn = \PhpConsole\Connector::getInstance();

        if($this->password !== null)
            $this->pc_conn->setPassword($this->password, true);

        $this->pc_instance = \PhpConsole\Handler::getInstance();
    }

    public function is_active()
    {
        if ($this->pc_conn === null || false === $this->pc_conn->isActiveClient())
            return false;

        if ($this->password !== null && false === $this->pc_conn->isAuthorized())
            return false;

        return true;
    }

    public function debug($log, $tag = 'Debug')
    {
        if ($this->is_active())
            $this->pc_conn->getDebugDispatcher()->dispatchDebug($log, $tag, 0);
    }

    public function error($message, $file = '', $line = '', $code = '')
    {
        if ($this->is_active())
            $this->pc_conn->getErrorsDispatcher()->dispatchError($code, $message, $file, $line, 0);
    }
}
