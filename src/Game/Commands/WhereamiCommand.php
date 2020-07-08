<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Factories\Spaceships\PlayerSpaceship;
use BinaryStudioAcademy\Game\Helpers\Messages;

final class WhereamiCommand extends AbstractCommand
{
    public function execute()
    {
        $this->writer->writeln(Messages::whereAmI($this->player->getCurrentGalaxy()));
    }
}