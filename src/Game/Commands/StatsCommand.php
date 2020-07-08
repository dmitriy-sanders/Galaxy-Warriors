<?php

namespace BinaryStudioAcademy\Game\Commands;

final class StatsCommand extends AbstractCommand
{
    public function execute()
    {
        $this->writer->writeln($this->player->stats());
    }
}