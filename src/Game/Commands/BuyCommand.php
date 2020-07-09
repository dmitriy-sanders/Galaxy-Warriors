<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Helpers\Hold;
use BinaryStudioAcademy\Game\Helpers\Messages;
use BinaryStudioAcademy\Game\Helpers\Stats;

final class BuyCommand extends AbstractCommand
{
    private array $params = [
        'strength',
        'armor',
        'reactor'
    ];

    public function execute(?string $param)
    {
        $crystalIndex = $this->getCrystalIndexIfExists();
        if ($this->isHome()) {
            if (!$param || !in_array($param, $this->params)) {
                $this->writer->writeln(Messages::errors('null_buy'));
            } else {
                if (is_int($crystalIndex)) {
                    $this->buyAction($param);
                } else {
                    $this->writer->writeln(Messages::errors('no_crystals'));
                }
            }
        } else {
            $this->writer->writeln(Messages::errors('buy_only'));
        }
    }

    private function getCrystalIndexIfExists(): ?int
    {
        $index = null;
        for ($i = 0; $i < Hold::SIZE; $i++) {
            if ($this->player->getHold()[$i] === Hold::CRYSTAL) {
                $index = $i;
                break;
            }
        }
        return $index;
    }

    private function buyAction(string $param)
    {
        switch ($param) {
            case 'strength':
                if ($this->player->getStrength() === Stats::MAX_STRENGTH) {
                    $this->writer->writeln(Messages::errors('max_strength'));
                } else {
                    $this->player->buyStrength($this->getCrystalIndexIfExists());
                    $this->writer->writeln(Messages::buyStrength($this->player->getStrength()));
                }
                break;
            case 'armor':
                if ($this->player->getArmor() === Stats::MAX_ARMOUR) {
                    $this->writer->writeln(Messages::errors('max_armor'));
                } else {
                    $this->player->buyArmor($this->getCrystalIndexIfExists());
                    $this->writer->writeln(Messages::buyArmor($this->player->getArmor()));
                }
                break;
            case 'reactor':
                $this->player->buyReactor($this->getCrystalIndexIfExists());
                $this->writer->writeln(Messages::buyReactor($this->player->getReactorsAmount()));
                break;
        }
    }
}