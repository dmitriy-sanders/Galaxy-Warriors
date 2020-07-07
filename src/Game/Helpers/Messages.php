<?php

namespace BinaryStudioAcademy\Game\Helpers;

final class Messages
{
    const SPACESHIPS = [
        'patrol' => [
            'name' => 'Patrol Spaceship',
            'stats' => [
                'strength' => 4,
                'armor' => 4,
                'luck' => 2,
                'health' => 100,
            ]
        ],
        'battle' => [
            'name' => 'Battle Spaceship',
            'stats' => [
                'strength' => 8,
                'armor' => 7,
                'luck' => 6,
                'health' => 100,
            ]
        ],
        'executor' => [
            'name' => 'Executor',
            'stats' => [
                'strength' => 10,
                'armor' => 10,
                'luck' => 10,
                'health' => 100,
            ]
        ]
    ];

    const GALAXIES = [
        'home' => [
            'galaxy' => 'Home Galaxy',
            'spaceship' => 'player'
        ],
        'andromeda' => [
            'galaxy' => 'Andromeda',
            'spaceship' => 'patrol'
        ],
        'pegasus' => [
            'galaxy' => 'Pegasus',
            'spaceship' => 'patrol'
        ],
        'spiral' => [
            'galaxy' => 'Spiral',
            'spaceship' => 'patrol'
        ],
        'shiar' => [
            'galaxy' => 'Shiar',
            'spaceship' => 'battle'
        ],
        'xeno' => [
            'galaxy' => 'Xeno',
            'spaceship' => 'battle'
        ],
        'isop' => [
            'galaxy' => 'Isop',
            'spaceship' => 'executor'
        ]
    ];

    public static function stats(array $data): string
    {
        return 'Spaceship stats:' . PHP_EOL
            . 'strength: ' . ($data['strength'] ?: 5) . PHP_EOL
            . 'armor: ' . ($data['armor'] ?: 5) . PHP_EOL
            . 'luck: ' . ($data['luck'] ?: 5)  . PHP_EOL
            . 'health: ' . ($data['health'] ?: 100)   . PHP_EOL
            . 'hold: ' . ($data['hold'] ?: '[ _ _ _ ]') . PHP_EOL;
    }

    public static function galaxy(string $galaxyLabel): string
    {
        $galaxy = self::GALAXIES[$galaxyLabel];
        $spaceship = self::SPACESHIPS[$galaxy['spaceship']];

        return "Galaxy: {$galaxy['galaxy']}." . PHP_EOL
            . "You see a {$spaceship['name']}: " . PHP_EOL
            . 'strength: ' . $spaceship['stats']['strength'] . PHP_EOL
            . 'armor: ' . $spaceship['stats']['armor'] . PHP_EOL
            . 'luck: ' . $spaceship['stats']['luck']  . PHP_EOL
            . 'health: ' . $spaceship['stats']['health']   . PHP_EOL;
    }

    public static function attack(
        string $spaceshipName,
        int $playerDamage,
        int $shipHealth,
        int $shipDamage,
        int $playerHealth
    ): string {
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

    public static function buySkill(string $skill, int $nextValue): string
    {
        return "You\'ve got upgraded skill: {$skill}. The level is {$nextValue} now." . PHP_EOL;
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
        $galaxy = self::GALAXIES[$galaxyLabel];

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

    public static function errors(string $key, string $params = ''): string
    {
        return [
            'undefined_galaxy' => 'Nah. No specified galaxy found.',
            'home_galaxy_grab' => 'Hah? You don\'t want to grab any staff at Home Galaxy. Believe me.',
            'home_galaxy_attack' => 'Calm down! No enemy spaceships detected. No one to fight with.',
            'grab_undestroyed_spaceship' => 'LoL. Unable to grab goods. Try to destroy enemy spaceship first.',
            'unknown_command' => "Command '$params' not found"
        ][$key];
    }
}