<?php

namespace BinaryStudioAcademy\Game\Helpers;

use BinaryStudioAcademy\Game\Contracts\Spaceship\ISpaceship;

final class Messages
{


    public static function stats(array $data): string
    {
        return 'Spaceship stats:' . PHP_EOL
            . 'strength: ' . ($data['strength'] ?: 5) . PHP_EOL
            . 'armor: ' . ($data['armor'] ?: 5) . PHP_EOL
            . 'luck: ' . ($data['luck'] ?: 5) . PHP_EOL
            . 'health: ' . ($data['health'] ?: 100) . PHP_EOL
            . 'hold: ' . ($data['hold'] ?: '[ _ _ _ ]') . PHP_EOL;
    }

    public static function galaxy(string $galaxyLabel, ISpaceship $spaceship): string
    {
        $galaxy = Config::GALAXIES[$galaxyLabel];

        return "Galaxy: {$galaxy['galaxy']}." . PHP_EOL
            . "You see a {$spaceship->getName()}: " . PHP_EOL
            . "strength: {$spaceship->getStrength()}" . PHP_EOL
            . "armor: {$spaceship->getArmor()}" . PHP_EOL
            . "luck: {$spaceship->getLuck()}" . PHP_EOL
            . "health: {$spaceship->getHealth()}" . PHP_EOL;
    }

    public static function attack(
        string $spaceshipName,
        int $playerDamage,
        int $shipHealth,
        int $shipDamage,
        int $playerHealth
    ): string
    {
        return "{$spaceshipName} has damaged on: {$playerDamage} points." . PHP_EOL
            . "health: {$shipHealth}" . PHP_EOL
            . "{$spaceshipName} damaged your spaceship on: {$shipDamage} points." . PHP_EOL
            . "health: {$playerHealth}" . PHP_EOL;
    }

    public static function destroyed(string $spaceshipName): string
    {
        return "{$spaceshipName} is totally destroyed. Hurry up! There is could be something useful to grab." . PHP_EOL;
    }

    public static function grabPatrolSpaceship(): string
    {
        return 'You got 🔋.' . PHP_EOL;
    }

    public static function grabBattleSpaceship(): string
    {
        return 'You got 🔋 🔮.' . PHP_EOL;
    }

    public static function homeGalaxy(): string
    {
        return 'Galaxy: Home Galaxy.' . PHP_EOL;
    }

    public static function buyStrength(int $nextValue): string
    {
        return "You\'ve got upgraded skill: strength. The level is {$nextValue} now." . PHP_EOL;
    }

    public static function buyArmor(int $nextValue): string
    {
        return "You\'ve got upgraded skill: armor. The level is {$nextValue} now." . PHP_EOL;
    }

    public static function buyReactor(int $nextValue): string
    {
        return "You\'ve bought a magnet reactor. You have {$nextValue} reactor(s) now." . PHP_EOL;
    }

    public static function applyReactor($health): string
    {
        return "Magnet reactor have been applied. Current spaceship health level is {$health}";
    }

    public static function finalWin(): string
    {
        return '🎉🎉🎉 Congratulations 🎉🎉🎉' . PHP_EOL
            . '🎉🎉🎉 You are winner! 🎉🎉🎉';
    }

    public static function whereAmI(string $galaxyLabel): string
    {
        $galaxy = Config::GALAXIES[$galaxyLabel];

        return "Galaxy: {$galaxy['galaxy']}" . PHP_EOL;
    }

    public static function help(): string
    {
        return 'List of commands:' . PHP_EOL
            . 'help - shows this list of commands' . PHP_EOL
            . 'stats - shows stats of spaceship' . PHP_EOL
            . 'set-galaxy <home|andromeda|spiral|pegasus|shiar|xeno|isop> - provides jump into specified galaxy' . PHP_EOL
            . 'attack - attacks enemy\'s spaceship' . PHP_EOL
            . 'grab - grab useful load from the spaceship' . PHP_EOL
            . 'buy <strength|armor|reactor> - buys skill or reactor (1 item)' . PHP_EOL
            . 'apply-reactor - apply magnet reactor to increase spaceship health level on 20 points' . PHP_EOL
            . 'whereami - shows current galaxy' . PHP_EOL
            . 'restart - restarts game' . PHP_EOL
            . 'exit - ends the game' . PHP_EOL;
    }

    public static function die(): string
    {
        return "Your spaceship got significant damages and eventually got exploded." . PHP_EOL
            . "You have to start from Home Galaxy." . PHP_EOL;
    }

    public static function restart(): string
    {
        return 'You restarted the game!' . PHP_EOL
            . 'You were teleported to Home Galaxy!' . PHP_EOL;
    }

    public static function exit(): string
    {
        return "🚀 Thank you for playing :) 🔥" . PHP_EOL;
    }

    public static function errors(string $key, string $params = ''): string
    {
        return [
            'undefined_galaxy' => 'Nah. No specified galaxy found.',
            'home_galaxy_grab' => 'Hah? You don\'t want to grab any staff at Home Galaxy. Believe me.',
            'home_galaxy_attack' => 'Calm down! No enemy spaceships detected. No one to fight with.',
            'grab_undestroyed_spaceship' => 'LoL. Unable to grab goods. Try to destroy enemy spaceship first.',
            'unknown_command' => "Command '$params' not found",
            'null_galaxy' => "Enter the name of the galaxy!",
            'max_health' => "You already have maximum level of health!",
            'max_strength' => "You can't buy strength, your strength is maximum level!",
            'max_armor' => "You can't buy armor, your armor is is maximum level!",
            'no_reactors' => "You don't have reactors to apply!",
            'already_killed' => 'You have already defeated the warrior!',
            'already_grabbed' => 'You have already grabbed the items!',
            'null_buy' => "I don't know what you want to buy!",
            'buy_only' => "You can buy items only at home!",
            'no_crystals' => "You don't have enough crystals to buy items!",
            'full_hold' => "Your hold doesn't have enough place for new items!"

        ][$key];
    }
}