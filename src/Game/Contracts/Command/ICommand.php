<?php

namespace BinaryStudioAcademy\Game\Contracts\Command;

interface ICommand
{
    public function execute(string $command, ?string $params);
}