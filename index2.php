<?php

trait A {
    public function getResultA()
    {
        return 5;
    }
}

trait B {
    public function getResultB()
    {
        return 4;
    }
}

class Example
{
    use A, B;
    
    public function getSum()
    {
        return $this->getResultA() + $this->getResultB();
    }
}

$example = new Example();
echo $example->getSum(); 