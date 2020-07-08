<?php

namespace BinaryStudioAcademy\Game\Galaxies;

use BinaryStudioAcademy\Game\Factories\SpaceshipFactory;
use BinaryStudioAcademy\Game\Helpers\Messages;

final class AndromedaGalaxy extends AbstractGalaxy
{
    public function main()
    {
        self::$warrior = (new SpaceshipFactory())->createSpaceship($this->spaceship);
        $this->writer->writeln(Messages::galaxy($this->galaxyLabel, self::$warrior));
    }
}