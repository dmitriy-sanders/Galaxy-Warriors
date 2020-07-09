<?php

namespace BinaryStudioAcademy\Game\Galaxies;

use BinaryStudioAcademy\Game\Contracts\Galaxy\IGalaxy;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Spaceship\ISpaceship;
use BinaryStudioAcademy\Game\Factories\SpaceshipFactory;
use BinaryStudioAcademy\Game\Helpers\Messages;
use BinaryStudioAcademy\Game\Contracts\Helpers\Random;

abstract class AbstractGalaxy implements IGalaxy
{
    protected string $galaxyLabel;
    protected string $galaxy;
    protected string $spaceship;
    protected Writer $writer;
    protected Random $random;
    protected static ISpaceship $warrior;
    protected SpaceshipFactory $spaceShipFactory;

    public function __construct(string $params, Writer $writer, Random $random)
    {
        $this->galaxyLabel = $params;
        $this->galaxy = Messages::GALAXIES[$params]['galaxy'];
        $this->spaceship = Messages::GALAXIES[$params]['spaceship'];
        $this->writer = $writer;
        $this->random = $random;
        $this->spaceShipFactory = new SpaceshipFactory();
    }

    public static function getWarrior()
    {
        return self::$warrior;
    }

    public function main()
    {
        self::$warrior = $this->spaceShipFactory->createSpaceship($this->spaceship, $this->random);
        $this->writer->writeln(Messages::galaxy($this->galaxyLabel, self::$warrior));
    }
}