<?php

namespace BinaryStudioAcademy\Game\Contracts\Spaceship;

interface ISpaceship
{
    public function holdPresenter(): string;

    public function stats(): string;

    public function getName(): string;

    public function getStrength(): int;

    public function getArmor(): int;

    public function getLuck(): int;

    public function getHealth(): int;

    public function getHold(): array;

}