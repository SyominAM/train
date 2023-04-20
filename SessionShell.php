<?php

class SessionShell 
{
  public function __construct()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
  }

  public function set($name, $value)
  {
    $_SESSION[$name] = $value;
  }

  public function get($name)
  {
    return $_SESSION[$name] ?? null;
  }

  public function del($name)
  {
    unset($_SESSION[$name]);
  }

  public function exists($name)
  {
    return isset($_SESSION[$name]);
  }

  public function destroy()
  {
    session_destroy();
  }
}
