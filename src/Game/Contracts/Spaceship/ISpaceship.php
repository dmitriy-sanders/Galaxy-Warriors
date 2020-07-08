<?php

namespace BinaryStudioAcademy\Game\Contracts\Spaceship;

interface ISpaceship
{
    public function holdPresenter(): string;

    public function stats(): string;

    public function getName(): string;
}