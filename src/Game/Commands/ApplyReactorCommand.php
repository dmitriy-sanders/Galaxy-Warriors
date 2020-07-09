<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Helpers\Messages;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class ApplyReactorCommand extends AbstractCommand
{
    public function execute()
    {
        if(is_int($this->isPlayerHavingReactor())) {
            if ($this->player->getHealth() === Stats::MAX_HEALTH) {
                $this->writer->writeln('You already have maximum level of health!');
            } else {
                $this->player->restoreHealth($this->isPlayerHavingReactor());
                $this->writer->writeln(Messages::applyReactor($this->player->getHealth()));
            }

        } else {
            $this->writer->writeln('You don\'t have reactors to apply!');
        }
    }

    private function isPlayerHavingReactor(): ?int
    {
        $index = null;
        for($i = 0; $i < 3; $i++) {
            if($this->player->getHold()[$i] === Hold::REACTOR) {
                $index = $i;
            }
        }
        return $index;
    }
}