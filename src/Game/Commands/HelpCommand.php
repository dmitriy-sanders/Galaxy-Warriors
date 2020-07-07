<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Messages;
use BinaryStudioAcademy\Game\Io\CliWriter;

final class HelpCommand
{
    public function execute(string $command, CliWriter $writer)
    {
        $writer->divider();
        $writer->writeln(Messages::help());
    }
}