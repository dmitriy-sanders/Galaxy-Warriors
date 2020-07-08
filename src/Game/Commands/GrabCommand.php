<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Messages;

final class GrabCommand extends AbstractCommand
{
    public function execute()
    {
        if (!self::$diedWarrior) {
            $this->writer->writeln("There is nothing to grab, win firstly!");
        } else {
            if (($this->player->getHoldWeight() + self::$diedWarrior->getHoldWeight()) <= 3) {
                $this->player->updateHold(self::$diedWarrior->getHold());
                $methodName = 'grab' . str_replace(' ', '', self::$diedWarrior->getName());
                self::$diedWarrior = null;
                $this->writer->writeln(Messages::$methodName());
            } else {
                $this->writer->writeln("Your hold doesn\'t have enough place for new items!");
            }
        }
    }
}