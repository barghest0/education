<?php

declare(strict_types=1);

final class Equation
{
    public $a;
    public $b;
    public $c;


    public function __construct(int $a, int $b, int $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public static function roots($a, $b, $c)
    {
        $D = ($b ** 2) - (4 * $a * $c);
        if ($D > 0) {
            $res1 = (-$b + sqrt($D)) / (2 * $a);
            $res2 = (-$b - sqrt($D)) / (2 * $a);
            return [$res1, $res2];
        } else if ($D == 0) {
            $res1 = -$b + sqrt($D) / 2 * $a;
            return  [$res1];
        } else {
            return ["Корней нет"];
        }
    }

    public static function validData(int $a, int $b, int $c): self
    {
        return new self($a, $b, $c);
    }
}
