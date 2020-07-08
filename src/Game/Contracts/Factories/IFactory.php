<?php

namespace BinaryStudioAcademy\Game\Contracts\Factories;

interface IFactory
{
    public function createSpaceship(string $type);
}