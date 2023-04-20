<?php

class Interval
{
    private $startDate;
    private $endDate;
    
    public function __construct($startDate, $endDate)
    {
        $this->startDate = strtotime($startDate);
        $this->endDate = strtotime($endDate);
    }
    
    public function toDays()
    {
        return round(abs($this->endDate - $this->startDate) / 86400);
    }
    
    public function toMonths()
    {
        return round(abs($this->endDate - $this->startDate) / 2592000);
    }
    
    public function toYears()
    {
        return round(abs($this->endDate - $this->startDate) / 31536000);
    }
}