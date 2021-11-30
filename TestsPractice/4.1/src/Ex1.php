<?php
class Ex1
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public static function ex($a)
    {
        if($a > 3) return $a+=10;
        else return $a-=10;
    }

    public static function validData(int $a): self
    {
        return new self($a);
    }
}
