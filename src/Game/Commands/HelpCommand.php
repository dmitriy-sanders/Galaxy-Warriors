<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Messages;

final class HelpCommand extends AbstractCommand
{
    public function execute()
    {
        $this->writer->writeln(Messages::help());
    }
}