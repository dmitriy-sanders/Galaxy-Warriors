<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Factories\Spaceships\PlayerSpaceship;
use BinaryStudioAcademy\Game\Helpers\Messages;

final class SetGalaxyCommand extends AbstractCommand
{
    private static array $params = [
        'home',
        'andromeda',
        'spiral',
        'pegasus',
        'shiar',
        'xeno',
        'isop',
    ];

    public function execute(string $command, string $params)
    {
        if ($params) {
            if (in_array($params, self::$params)) {
                $galaxyClass = $this->getGalaxyClassname($params);
                if (class_exists($galaxyClass)) {
                    $galaxyObj = new $galaxyClass($params, $this->writer);
                    if (method_exists($galaxyObj, 'main')) {
                        PlayerSpaceship::getInstance()->setGalaxy($params);
                        $galaxyObj->main();
                    }
                }
            } else {
                $this->writer->writeln(Messages::errors('undefined_galaxy'));
            }
        } else {
            $this->writer->writeln('Enter the name of the galaxy!');
        }
    }

    private function getGalaxyClassname(string $params)
    {
        $namespace ='BinaryStudioAcademy\\Game\\Galaxies\\';
        return  $namespace .
            implode('', array_map('ucfirst', explode(' ', $params)))
            . 'Galaxy';
    }
}