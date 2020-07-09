<?php

namespace BinaryStudioAcademy\Game\Factories;

use BinaryStudioAcademy\Game\Contracts\Factories\IFactory;
use BinaryStudioAcademy\Game\Contracts\Helpers\Random;

final class SpaceshipFactory implements IFactory
{
    public function createSpaceship(string $type, Random $random)
    {
        $namespace = 'BinaryStudioAcademy\\Game\\Factories\\Spaceships\\';
        $spaceShipType = $namespace . ucfirst($type) . 'Spaceship';
        return new $spaceShipType($random);
    }
}