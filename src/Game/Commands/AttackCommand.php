<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Math;
use BinaryStudioAcademy\Game\Helpers\Messages;

final class AttackCommand extends AbstractCommand
{
    public function execute() {

        $math = new Math();

        $currentGalaxy = $this->player->getCurrentGalaxy();
        if ($currentGalaxy !== 'home') {
            $playerLuck = $math->luck($this->random, $this->player->getLuck());
            $playerDamage = $playerLuck ?
                $math->damage($this->player->getStrength(), $this->player->getArmor()) : 0;


            $classCurrGalaxy = 'BinaryStudioAcademy\\Game\\Galaxies\\'
                . ucfirst($currentGalaxy) . 'Galaxy';

            $warrior = $classCurrGalaxy::getWarrior();
            $warriorLuck = $math->luck($this->random, $warrior->getLuck());
            $warriorDamage = $warriorLuck ?
                $math->damage($warrior->getStrength(), $warrior->getArmor()) : 0;

            $warrior->makeDamage($playerDamage);
            if ($this->player->getHealth() <= 0) {
                $this->writer->writeln('You died:(');
                $this->player->restart();
            }

            $this->player->makeDamage($warriorDamage);
            if ($warrior->getHealth() <= 0) {
                self::$diedWarrior = $warrior;
                $this->writer->writeln(Messages::destroyed($warrior->getName()));
            }

            if ($this->player->getHealth() > 0 && $warrior->getHealth() > 0) {
                $this->writer->writeln(Messages::attack(
                    $warrior->getName(),
                    $playerDamage,
                    $warrior->getHealth(),
                    $warriorDamage,
                    $this->player->getHealth()
                ));
            }
        } else {
            $this->writer->writeln("You can't attack at home!");
        }
    }
}