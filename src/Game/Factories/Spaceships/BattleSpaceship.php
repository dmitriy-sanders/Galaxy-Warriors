<?php

namespace BinaryStudioAcademy\Game\Factories\Spaceships;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Contracts\Helpers\Random;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class BattleSpaceship extends AbstractSpaceship
{
    protected string $name = 'Battle Spaceship';

    public function __construct(Random $random)
    {
        $this->strength = $random->getRandomInt(5, 8);
        $this->armor = $random->getRandomInt(6, 8);
        $this->luck = $random->getRandomInt(3, 6);
        $this->health = Stats::MAX_HEALTH;
        $this->hold = [Hold::REACTOR, Hold::CRYSTAL, ''];
    }
}