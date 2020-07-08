<?php

namespace BinaryStudioAcademy\Game\Factories\Spaceships;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class PlayerSpaceship extends AbstractSpaceship
{
    protected int $strength = 5;
    protected int $armor = 5;
    protected int $luck = 5;
    protected int $health = 100;
    protected array $hold = ['', '', ''];

    protected string $name = 'Player Spaceship';
    protected string $currentGalaxy = 'home';

    protected static $instance;

    public function setGalaxy(string $galaxy)
    {
        $this->currentGalaxy = $galaxy;
    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function restart()
    {
        $this->strength = 5;
        $this->armor = 5;
        $this->luck = 5;
        $this->health = 100;
        $this->hold = ['', '', ''];
        $this->currentGalaxy = 'home';
    }
}