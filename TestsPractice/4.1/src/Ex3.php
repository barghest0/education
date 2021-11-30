<?php
class Ex3
{
    private $string;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public static function ex($string)
    {
        return substr_count($string, 'aba');
    }

    public static function validData(string $string): self
    {
        return new self($string);
    }

}
