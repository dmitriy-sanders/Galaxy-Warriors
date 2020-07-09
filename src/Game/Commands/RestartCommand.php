<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Messages;

final class RestartCommand extends AbstractCommand
{
    public function execute()
    {
        $this->player->restart();
        $this->writer->writeln(Messages::restart());
    }
}