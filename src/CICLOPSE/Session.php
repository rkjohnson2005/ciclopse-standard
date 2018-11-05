<?php
namespace CICLOPSE;

class Session
{
    protected static $adapter;

    public static function init(SessionAdapter $adapter)
    {
        self::$adapter = $adapter;
    }
    public static function get($var)
    {
        return self::$adapter->get($var);
    }
    public static function set($var, $value)
    {
        return self::$adapter->set($var, $value);
    }
}

interface SessionAdapter
{
    public function get($var);
    public function set($var, $value);
}

Class PhpSessionAdapter implements SessionAdapter
{
    public function __construct()
    {
        session_start();
    }

    public function get($var)
    {
        return isset($_SESSION[$var]) ? $_SESSION[$var] : null;
    }
    public function set($var, $value)
    {
        $_SESSION[$var] = $value;
    }

    public function __destruct()
    {
        session_destroy();
    }
}

Class MemorySessionAdapter implements SessionAdapter
{
    private $session;
    public function __construct()
    {
        $this->session = [];
    }

    public function get($var)
    {
        return isset($this->session[$var]) ? $this->session[$var] : null;
    }
    public function set($var, $value)
    {
        $this->session[$var] = $value;
    }
}