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
        if ($this->isHome()) {
            if (!$param || !in_array($param, $this->params)) {
                $this->writer->writeln('I don\'t know what you want to buy!');
            } else {
                if (is_int($this->isPlayerHavingCrystal())) {
                    $this->buyAction($param);
                } else {
                    $this->writer->writeln('You don\'t have enough crystals to buy items!');
                }
            }
        } else {
            $this->writer->writeln('You can buy items only at home!');
        }
    }

    private function isPlayerHavingCrystal(): ?int
    {
        $index = null;
        for($i = 0; $i < 3; $i++) {
            if($this->player->getHold()[$i] === Hold::CRYSTAL) {
                $index = $i;
            }
        }
        return $index;
    }

    private function buyAction(string $param)
    {
        switch ($param) {
            case 'strength':
                if($this->player->getStrength() === Stats::MAX_STRENGTH) {
                    $this->writer->writeln('You can\'t buy strength, your strength is full!');
                } else {
                    $this->player->buyStrength($this->isPlayerHavingCrystal());
                    $this->writer->writeln(Messages::buyStrength($this->player->getStrength()));
                }
                break;
            case 'armor':
                if($this->player->getArmor() === Stats::MAX_ARMOUR) {
                    $this->writer->writeln('You can\'t buy armor, your armor is full!');
                } else {
                    $this->player->buyArmor($this->isPlayerHavingCrystal());
                    $this->writer->writeln(Messages::buyArmor($this->player->getArmor()));
                }
                break;
            case 'reactor':
                $this->player->buyReactor($this->isPlayerHavingCrystal());
                $this->writer->writeln(Messages::buyReactor($this->player->getReactorsAmount()));
                break;
        }
    }
}