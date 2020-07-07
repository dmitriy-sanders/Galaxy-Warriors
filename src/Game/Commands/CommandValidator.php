<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Command\IValidator;
use BinaryStudioAcademy\Game\Helpers\Messages;
use BinaryStudioAcademy\Game\Io\CliWriter;

final class CommandValidator implements IValidator
{
    private static $commands = [
        'help',
        'stats',
        'set-galaxy' => [
            'home',
            'andromeda',
            'spiral',
            'pegasus',
            'shiar',
            'xeno',
            'isop',
        ],
        'attack',
        'grab',
        'buy' => [
            'strength',
            'armor',
            'reactor',
        ],
        'apply-reactor',
        'whereami',
        'restart',
        'exit',
    ];

    public function validate(string $command, ?string $params)
    {
        $writer = new CliWriter();
        if (in_array($command, self::$commands)) {
            $commandClass = __NAMESPACE__ . '\\' .ucfirst($command) . 'Command';
            if (class_exists($commandClass)) {
                $commandObj = new $commandClass();
                if (method_exists($commandObj, 'execute')) {
                    if($params) {
                        $commandObj->execute($command, $params, $writer);
                    } else {
                        $commandObj->execute($command, $writer);
                    }
                }
            }
        } else {
            $writer->writeln(Messages::errors('unknown_command', $command));
        }
    }
}