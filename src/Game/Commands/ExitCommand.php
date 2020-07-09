<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Messages;

final class ExitCommand extends AbstractCommand
{
    public function execute()
    {
        $this->writer->writeln(Messages::exit());
        exit();
    }
}