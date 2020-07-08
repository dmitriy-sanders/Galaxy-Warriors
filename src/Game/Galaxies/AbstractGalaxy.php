<?php

namespace BinaryStudioAcademy\Game\Galaxies;

use BinaryStudioAcademy\Game\Contracts\Galaxy\IGalaxy;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Factories\Spaceships\AbstractSpaceship;
use BinaryStudioAcademy\Game\Helpers\Messages;

abstract class AbstractGalaxy implements IGalaxy
{
    protected string $galaxyLabel;
    protected string $galaxy;
    protected string $spaceship;
    protected Writer $writer;
    protected static AbstractSpaceship $warrior;

    public function __construct(string $params, Writer $writer)
    {
        $this->galaxyLabel = $params;
        $this->galaxy = Messages::GALAXIES[$params]['galaxy'];
        $this->spaceship = Messages::GALAXIES[$params]['spaceship'];
        $this->writer = $writer;

        $this->wereTeleported();
    }

    protected function wereTeleported()
    {
        $this->writer->writeln("You were teleported to {$this->galaxy}");
    }

    public static function getWarrior()
    {
        return self::$warrior;
    }
}