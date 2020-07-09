<?php

namespace BinaryStudioAcademy\Game\Factories\Spaceships;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Helpers\Random;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class BattleSpaceship extends AbstractSpaceship
{
    protected string $name = 'Battle Spaceship';

    public function __construct(Random $random)
    {
        $this->strength = floor($random->get() * (8 - 5 + 1)) + 5;
        $this->armor = floor($random->get() * (8 - 6 + 1)) + 6;
        $this->luck = floor($random->get() * (6 - 3 + 1)) + 3;
        $this->health = Stats::MAX_HEALTH;
        $this->hold = [Hold::REACTOR, Hold::CRYSTAL, ''];
    }
}