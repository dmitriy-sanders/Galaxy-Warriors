<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Helpers\Messages;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class ApplyReactorCommand extends AbstractCommand
{
    public function execute()
    {
        $reactorIndex = $this->getReactorIndexIfExists();
        if (is_int($reactorIndex)) {
            if ($this->player->getHealth() === Stats::MAX_HEALTH) {
                $this->writer->writeln(Messages::errors('max_health'));
            } else {
                $this->player->restoreHealth($reactorIndex);
                $this->writer->writeln(Messages::applyReactor($this->player->getHealth()));
            }
        } else {
            $this->writer->writeln(Messages::errors('no_reactors'));
        }
    }

    private function getReactorIndexIfExists(): ?int
    {
        $index = null;
        for ($i = 0; $i < Hold::SIZE; $i++) {
            if ($this->player->getHold()[$i] === Hold::REACTOR) {
                $index = $i;
                break;
            }
        }
        return $index;
    }
}