<?php

namespace BinaryStudioAcademy\Game\Helpers;

use BinaryStudioAcademy\Game\Contracts\Helpers\Random as IRandom;

class Random implements IRandom
{
    public function get(): float
    {
        return mt_rand() / mt_getrandmax();
    }

    public static function getRandomInt(int $min, int $max)
    {
        return mt_rand($min, $max);
    }
}
