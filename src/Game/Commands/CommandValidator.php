<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Command\IValidator;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Helpers\Messages;
use BinaryStudioAcademy\Game\Contracts\Helpers\Random;

final class CommandValidator implements IValidator
{
    private static array $commands = [
        'help',
        'stats',
        'set-galaxy',
        'attack',
        'grab',
        'buy',
        'apply-reactor',
        'whereami',
        'restart',
        'exit',
    ];

    public function validate(string $command, ?string $params, Random $random, Writer $writer)
    {
        if (in_array($command, self::$commands)) {
            $commandClass = $this->getCommandClassName($command);
            if (class_exists($commandClass)) {
                $commandObj = new $commandClass($random, $writer);
                if (method_exists($commandObj, 'execute')) {
                    $commandObj->execute($params);
                }
            }
        } else {
            $writer->writeln(Messages::errors('unknown_command', $command));
        }
    }

    private function getCommandClassName(string $command)
    {
        return __NAMESPACE__ . '\\' .
            implode('', array_map('ucfirst', explode('-', $command)))
            . 'Command';
    }
}