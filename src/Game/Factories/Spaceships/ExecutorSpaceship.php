<?php

namespace BinaryStudioAcademy\Game\Factories\Spaceships;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class ExecutorSpaceship extends AbstractSpaceship
{
    public function __construct()
    {
        $this->strength = Stats::MAX_STRENGTH;
        $this->armor = Stats::MAX_ARMOUR;
        $this->luck = Stats::MAX_LUCK;
        $this->health = Stats::MAX_HEALTH;
        $this->hold = [Hold::REACTOR, Hold::CRYSTAL, Hold::CRYSTAL];
    }

}