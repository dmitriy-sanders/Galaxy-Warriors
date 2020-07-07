<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Command\ICommand;

abstract class AbstractCommand implements ICommand
{
    public function execute(string $command, ?string $params){}
}