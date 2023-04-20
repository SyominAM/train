<?php
  class Validator
  {
    public function isEmail($str)
    {
      return filter_var($str, FILTER_VALIDATE_EMAIL);
    }
    
    public function isDomain($str)
    {
      return filter_var($str, FILTER_VALIDATE_DOMAIN);
    }
    
    public function inRange($num, $from, $to)
    {
      return $num >= $from && $num <= $to;
    }
    
    public function inLength($str, $from, $to)
    {
      $length = strlen($str);
      return $length >= $from && $length <= $to;
    }
  }