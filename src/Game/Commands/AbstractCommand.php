<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Factories\Spaceships\AbstractSpaceship;
use BinaryStudioAcademy\Game\Factories\Spaceships\PlayerSpaceship;
use BinaryStudioAcademy\Game\Helpers\Random;

abstract class AbstractCommand
{
    protected Random $random;
    protected Writer $writer;
    protected PlayerSpaceship $player;
    protected static ?AbstractSpaceship $diedWarrior = null;

    public function __construct(Random $random, Writer $writer)
    {
        $this->random = $random;
        $this->writer = $writer;
        $this->player = PlayerSpaceship::getInstance();
    }
}