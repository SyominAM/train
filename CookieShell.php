<?php
class CookieShell
{
    public function set($name, $value, $time)
    {
        setcookie($name, $value, time() + $time);
    }

    public function get($name)
    {
        return $_COOKIE[$name] ?? null;
    }

    public function del($name)
    {
        setcookie($name, '', -1);
    }

    public function exists($name)
    {
        return isset($_COOKIE[$name]);
    }
}
