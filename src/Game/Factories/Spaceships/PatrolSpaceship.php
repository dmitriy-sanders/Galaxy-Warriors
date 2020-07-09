<?php

namespace BinaryStudioAcademy\Game\Factories\Spaceships;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Contracts\Helpers\Random;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class PatrolSpaceship extends AbstractSpaceship
{
    protected string $name = 'Patrol Spaceship';

    public function __construct(Random $random)
    {
        $this->strength = $random->getRandomInt(3, 4);
        $this->armor = $random->getRandomInt(2, 4);
        $this->luck = $random->getRandomInt(1, 2);
        $this->health = Stats::MAX_HEALTH;
        $this->hold = [Hold::REACTOR, '', ''];
    }
}