<?php
class Ex2
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public static function ex()
    {
        $tmp = 0;
        for ($i=10; $i <=88 ; $i++) { 
            $tmp+=$i;
        }
        return $tmp;
    }

}
