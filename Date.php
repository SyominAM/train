<?php

class Date
{
    protected $timestamp;
 
    public function __construct($date)
    {
        $this->timestamp = strtotime($date);
    }

    public function getDay()
    {
        return date('d', $this->timestamp);
    }
 
    public function getMonth($lang = null)
    {
        switch (strtolower($lang)) {
            case 'ru': 
            $month = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
            break;
   
            default:
                 $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                break;
        }
        return $month[intval(date('m', $this->timestamp)) - 1];
    }

    public function getYear()
    {
        return date('Y', $this->timestamp);
    }
 
    public function getWeekDay($lang = null)
    {
        switch (strtolower($lang)) {
            case 'ru': 
                $weekdays = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];
                break;
   
                default:
                    $weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                    break;
        }
        return $weekdays[intval(date('w', $this->timestamp))];
    }
 
    public function addDay($value)
    {
        $this->timestamp += $value * 24 * 60 * 60;
        return $this;
    }
 
    public function subDay($value)
    {
        $this->timestamp -= $value * 24 * 60 * 60;
        return $this;
    }
 
    public function addMonth($value)
    {
        $this->timestamp = strtotime(date('Y-m-d', $this->timestamp) . "+{$value} month");
        return $this;
    }
 
    public function subMonth($value)
    {
        $this->timestamp = strtotime(date('Y-m-d', $this->timestamp) . "-{$value} month");
        return $this;
    }
 
    public function addYear($value)
    {
        $this->timestamp = strtotime(date('Y-m-d', $this->timestamp) . "+{$value} year");
        return $this;
    }
 
    public function subYear($value)
    {
        $this->timestamp = strtotime(date('Y-m-d', $this->timestamp) . "-{$value} year");
        return $this;
    }
 
    public function format($format)
    {
        return date($format, $this->timestamp);
    }
 
    public function __toString()
    {
         return date('Y-m-d', $this->timestamp);
    }
}