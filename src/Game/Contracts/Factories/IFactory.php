<?php

namespace BinaryStudioAcademy\Game\Contracts\Factories;

use BinaryStudioAcademy\Game\Contracts\Helpers\Random;

interface IFactory
{
    public function createSpaceship(string $type, Random $random);
}