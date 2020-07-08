<?php

namespace BinaryStudioAcademy\Game\Commands;

final class RestartCommand extends AbstractCommand
{
    public function execute()
    {
        $this->player->restart();
        $this->writer->writeln('You restarted the game!');
        $this->writer->writeln('You were teleported to Home Galaxy!');
    }
}