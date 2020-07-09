<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Messages;

final class SetGalaxyCommand extends AbstractCommand
{
    private array $params = [
        'home',
        'andromeda',
        'spiral',
        'pegasus',
        'shiar',
        'xeno',
        'isop',
    ];

    public function execute(?string $params)
    {
        if ($params) {
            if (in_array($params, $this->params)) {
                $galaxyClass = $this->getGalaxyClassname($params);
                if (class_exists($galaxyClass)) {
                    $galaxyObj = new $galaxyClass($params, $this->writer, $this->random);
                    if (method_exists($galaxyObj, 'main')) {
                        $this->player->setGalaxy($params);
                        static::$grabbed = false;
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