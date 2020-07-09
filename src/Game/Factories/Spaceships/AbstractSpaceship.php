<?php

namespace BinaryStudioAcademy\Game\Factories\Spaceships;

use BinaryStudioAcademy\Game\Contracts\Spaceship\ISpaceship;

abstract class AbstractSpaceship implements ISpaceship
{
    protected int $strength;
    protected int $armor;
    protected int $luck;
    protected int $health;
    protected array $hold;
    protected string $name;
    protected string $currentGalaxy;

    public function stats(): string
    {
        return "Spaceship stats:" . PHP_EOL
            . "strength: {$this->strength}" . PHP_EOL
            . "armor: {$this->armor}" . PHP_EOL
            . "luck:  {$this->luck}" . PHP_EOL
            . "health: {$this->health}" . PHP_EOL
            . "hold: {$this->holdPresenter()}" . PHP_EOL;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getArmor(): int
    {
        return $this->armor;
    }

    public function getLuck(): int
    {
        return $this->luck;
    }

    public function getHealth(): int
    {
        return $this->health;
    }
    
    public function holdPresenter(): string
    {
        if (empty($this->hold)) {
            $holdResult = '[ _ _ _ ]';
        } else {
            $holdResult = '[ ';
            foreach ($this->hold as $item) {
                if ($item) {
                   $holdResult .= $item . ' ';
                } else {
                    $holdResult .= '_ ';
                }
            }
            $holdResult .= ']';
        }
        return $holdResult;
    }

    public function getHoldWeight(): int
    {
        $counter = 0;
        foreach ($this->hold as $item) {
            if ($item) {
                $counter++;
            }
        }
        return $counter;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function makeDamage(int $damage)
    {
        $this->health -= $damage;
    }

    public function getHold()
    {
        return $this->hold;
    }

    public function isBoss()
    {
        return $this->name === 'Executor';
    }
}