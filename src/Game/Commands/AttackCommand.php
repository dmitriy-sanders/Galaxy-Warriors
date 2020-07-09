<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Math;
use BinaryStudioAcademy\Game\Helpers\Messages;

final class AttackCommand extends AbstractCommand
{
    /**
     * If warrior is killed => dead, initialize diedWarrior
     */
    public function execute()
    {
        $math = new Math();
        $currentGalaxy = $this->player->getCurrentGalaxy();
        $classCurrGalaxy = 'BinaryStudioAcademy\\Game\\Galaxies\\'
            . ucfirst($currentGalaxy) . 'Galaxy';

        if (!$this->isHome()) {

            $warrior = $classCurrGalaxy::getWarrior();
            $playerLuck = $math->luck($this->random, $this->player->getLuck());
            $playerDamage = $playerLuck ?
                $math->damage($this->player->getStrength(), $warrior->getArmor()) : 0;

            $warriorLuck = $math->luck($this->random, $warrior->getLuck());
            $warriorDamage = $warriorLuck ?
                $math->damage($warrior->getStrength(), $this->player->getArmor()) : 0;

            $warrior->makeDamage($playerDamage);

            if ($warrior->getHealth() <= 0 && !self::$grabbed && !self::$diedWarrior) {
                self::$diedWarrior = $warrior;
                if ($warrior->isBoss()) {
                    $this->writer->writeln(Messages::finalWin());
                    exit();
                } else {
                    $this->writer->writeln(Messages::destroyed($warrior->getName()));
                }
            } else if ($warrior->getHealth() > 0) {
                $this->player->makeDamage($warriorDamage);
                if ($this->player->getHealth() <= 0) {
                    $this->writer->writeln(Messages::die());
                    $this->player->restart();
                } else {
                    $this->writer->writeln(Messages::attack(
                        $warrior->getName(),
                        $playerDamage,
                        $warrior->getHealth(),
                        $warriorDamage,
                        $this->player->getHealth()
                    ));
                }
            } else if (self::$diedWarrior || !self::$diedWarrior && self::$grabbed) {
                $this->writer->writeln(Messages::errors('already_killed'));
            } else if (self::$grabbed) {
                $this->writer->writeln(Messages::errors('already_grabbed'));
            }
        } else {
            $this->writer->writeln(Messages::errors('home_galaxy_attack'));
        }
    }
}