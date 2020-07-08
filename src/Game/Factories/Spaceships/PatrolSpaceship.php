<?php

namespace BinaryStudioAcademy\Game\Factories\Spaceships;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Helpers\Random;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class PatrolSpaceship extends AbstractSpaceship
{
    protected string $name = 'Patrol Spaceship';

    public function __construct()
    {
        $this->strength = Random::getRandomInt(3, 4);
        $this->armor = Random::getRandomInt(2, 4);
        $this->luck = Random::getRandomInt(1, 2);
        $this->health = Stats::MAX_HEALTH;
        $this->hold = [Hold::REACTOR, '', ''];
    }
}