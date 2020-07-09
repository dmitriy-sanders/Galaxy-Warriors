<?php

namespace BinaryStudioAcademy\Game\Factories\Spaceships;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Helpers\Random;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class PatrolSpaceship extends AbstractSpaceship
{
    protected string $name = 'Patrol Spaceship';

    public function __construct(Random $random)
    {
        $this->strength = floor($random->get() * (4 - 3 + 1)) + 3;
        $this->armor = floor($random->get() * (4 - 2 + 1)) + 2;
        $this->luck = floor($random->get() * (2 - 1 + 1)) + 1;
        $this->health = Stats::MAX_HEALTH;
        $this->hold = [Hold::REACTOR, '', ''];
    }
}