<?php

namespace BinaryStudioAcademy\Game\Factories\Spaceships;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class PlayerSpaceship extends AbstractSpaceship
{
    protected int $strength = 10;
    protected int $armor = 10;
    protected int $luck = 10;
    protected int $health = Stats::MAX_HEALTH;
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

    public function buyStrength(int $index)
    {
        $this->strength += 1;
        $this->deleteCrystal($index);
    }

    public function buyArmor(int $index)
    {
        $this->armor += 1;
        if ($this->armor > 10) {
            $this->armor = 10;
        }
        $this->deleteCrystal($index);
    }

    public function buyReactor(int $index)
    {
        $this->hold[$index] = Hold::REACTOR;
    }

    protected function deleteCrystal(int $index)
    {
        $this->hold[$index] = '';
    }

    protected function deleteReactor(int $index)
    {
        $this->hold[$index] = '';
    }

    public function restoreHealth(int $index)
    {
        $this->health += 20;
        if ($this->health > 100) {
            $this->health = 100;
        }
        $this->deleteReactor($index);
    }

    public function getCurrentGalaxy(): string
    {
        return $this->currentGalaxy;
    }

    public function updateHold(array $newHold)
    {
        $myItems = array_filter($this->hold);
        $newItems = array_filter($newHold);

        $this->hold = array_merge($myItems, $newItems);
        while(count($this->hold) !== 3) {
            $this->hold[] = '';
        }
    }

    public function getReactorsAmount()
    {
        $counter = 0;
        foreach ($this->hold as $item) {
            if ($item === Hold::REACTOR) {
                $counter++;
            }
        }
        return $counter;
    }

}