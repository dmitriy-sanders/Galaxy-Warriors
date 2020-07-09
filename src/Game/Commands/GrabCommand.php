<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Messages;

final class GrabCommand extends AbstractCommand
{
    public function execute()
    {
        if (!self::$diedWarrior) {
            if ($this->isHome()) {
                $this->writer->writeln(Messages::errors('home_galaxy_grab'));
            } else {
                $this->writer->writeln(Messages::errors('grab_undestroyed_spaceship'));
            }
        } else {
            if (($this->player->getHoldWeight() + self::$diedWarrior->getHoldWeight()) <= 3) {
                $this->player->updateHold(self::$diedWarrior->getHold());
                $this->chooseMessageText(self::$diedWarrior->getName());
                self::$diedWarrior = null;
                self::$grabbed = true;
            } else {
                $this->writer->writeln("Your hold doesn\'t have enough place for new items!");
            }
        }
    }

    private function chooseMessageText(string $warriorName)
    {
        switch ($warriorName) {
            case 'Patrol Spaceship':
                $this->writer->writeln(Messages::grabPatrolSpaceship());
                break;
            case 'Battle Spaceship':
                $this->writer->writeln(Messages::grabBattleSpaceship());
                break;
            case 'Executor':
                $this->writer->writeln(Messages::finalWin());
                break;
        }
    }
}