<?php

namespace BinaryStudioAcademy\Game\Factories;

use BinaryStudioAcademy\Game\Contracts\Factories\IFactory;

final class SpaceshipFactory implements IFactory
{
    public function createSpaceship(string $type)
    {
        $namespace = 'BinaryStudioAcademy\\Game\\Factories\\Spaceships\\';
        $spaceShipType = $namespace . ucfirst($type) . 'Spaceship';
        return new $spaceShipType();
    }
}