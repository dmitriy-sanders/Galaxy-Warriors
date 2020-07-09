<?php

namespace BinaryStudioAcademy\Game\Commands;

final class ExitCommand extends AbstractCommand
{
    public function execute()
    {
        $this->writer->writeln('Thank you for playing :)');
        exit();
    }
}