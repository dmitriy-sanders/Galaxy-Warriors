<?php

namespace BinaryStudioAcademyTests\Game;

use PHPUnit\Framework\TestCase;
use BinaryStudioAcademy\Game\Game;
use BinaryStudioAcademyTests\Stubs\StableRandom;

final class GameTest extends TestCase
{
    /**
     * @dataProvider gameFlowProvider
     */
    public function test_game(array $commands): void
    {
        $game = new Game(
            new StableRandom(1.0)
        );

        $gameTester = new GameTester($game);

        foreach ($commands as [ $command, $expectedOutput]) {
            $output = $gameTester->run($command);

            $this->assertEquals(trim($expectedOutput), trim($output));
        }
    }

    public function gameFlowProvider(): array
    {
        return [
            'basic commands' => [
                [
                    [
                        'help',
                        Messages::help()
                    ],
                    [
                        'stats', Messages::stats([
                            'strength' => 4,
                            'armour' => 3,
                            'luck' => 5,
                            'health' => 100,
                            'hold' => '[ _ _ _ ]'
                        ])
                    ]
                ]
            ],

            'win commands' => [
                $this->getWinCommands()
            ],

            'walk through map' => [
                [
                    [
                        'set-galaxy andromeda', Messages::galaxy('andromeda')
                    ],
                    [
                        'whereami', Messages::whereAmI('andromeda')
                    ],
                    [
                        'set-galaxy pegasus', Messages::galaxy('pegasus')
                    ],
                    [
                        'whereami', Messages::whereAmI('pegasus')
                    ],
                    [
                        'set-galaxy spiral', Messages::galaxy('spiral')
                    ],
                    [
                        'whereami', Messages::whereAmI('spiral')
                    ],
                    [
                        'set-galaxy shiar', Messages::galaxy('shiar')
                    ],
                    [
                        'whereami', Messages::whereAmI('shiar')
                    ],
                    [
                        'set-galaxy xeno', Messages::galaxy('xeno')
                    ],
                    [
                        'whereami', Messages::whereAmI('xeno')
                    ],
                    [
                        'set-galaxy isop', Messages::galaxy('isop')
                    ],
                    [
                        'whereami', Messages::whereAmI('isop')
                    ],
                    [
                        'set-galaxy home', Messages::homeGalaxy()
                    ],
                    [
                        'whereami', Messages::whereAmI('home')
                    ],
                ],
            ],

            'exceptional cases' => [
                [
                    [
                        'set-galaxy blah', Messages::errors('undefined_galaxy')
                    ],
                    [
                        'grab', Messages::errors('home_galaxy_grab')
                    ],
                    [
                        'attack', Messages::errors('home_galaxy_attack')
                    ],
                    [
                        'set-galaxy spiral', Messages::galaxy('xeno')
                    ],
                    [
                        'grab', Messages::errors('grab_undestroyed_spaceship')
                    ],
                    [
                        'unknown_command', Messages::errors('unknown_command')
                    ],
                ]
            ],

            'loose battle' => [
                [
                    [
                        'set-galaxy andromeda', Messages::galaxy('andromeda')
                    ],
                    [
                        'attack', Messages::attack(
                            'Patrol Spaceship',
                            10, 40, 10, 50
                        )
                    ],
                    [
                        'attack', Messages::attack(
                            'Patrol Spaceship',
                            10, 30, 10, 40
                        )
                    ],
                    [
                        'attack', Messages::attack(
                            'Patrol Spaceship',
                            10, 20, 10, 30
                        )
                    ],
                    [
                        'attack', Messages::attack(
                            'Patrol Spaceship',
                            10, 10, 10, 20
                        )
                    ],
                    [
                        'attack', Messages::destroyed('Patrol Spaceship')
                    ],
                    [
                        'grab', Messages::grabPatrolSpaceship()
                    ],
                    [
                        'set-galaxy isop', Messages::galaxy('isop')
                    ],
                    [
                        'attack', Messages::die()
                    ],
                    [
                        'whereami', Messages::whereAmI('home')
                    ],
                    [
                        'stats', Messages::stats([
                            'strength' => 4,
                            'armour' => 3,
                            'luck' => 5,
                            'health' => 100,
                            'hold' => '[ _ _ _ ]'
                        ])
                    ],
                ]
            ]
        ];
    }

    private function getWinCommands()
    {
        $firstBattle = [
            [
                'set-galaxy pegasus', Messages::galaxy('pegasus')
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    10, 40, 10, 50
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    10, 30, 10, 40
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    10, 20, 10, 30
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    10, 10, 10, 20
                )
            ],
            [
                'attack', Messages::destroyed('Patrol Spaceship')
            ],
            [
                'grab', Messages::grabPatrolSpaceship()
            ],
        ];

        $secondBattle = [
            [
                'set-galaxy spiral', Messages::galaxy('spiral')
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    13, 37, 10, 50
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    13, 24, 10, 40
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    13, 11, 10, 30
                )
            ],
            [
                'attack', Messages::destroyed('Patrol Spaceship')
            ],
            [
                'grab', Messages::grabPatrolSpaceship()
            ],
            [
                'set-galaxy home', Messages::homeGalaxy()
            ],
            [
                'buy strength', Messages::buySkill('strength', 6)
            ],
        ];

        $thirdBattle = [
            [
                'set-galaxy andromeda', Messages::galaxy('andromeda')
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    15, 35, 10, 50
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    15, 20, 10, 40
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    15, 5, 10, 30
                )
            ],
            [
                'attack', Messages::destroyed('Patrol Spaceship')
            ],
            [
                'grab', Messages::grabPatrolSpaceship()
            ],
            [
                'set-galaxy home', Messages::homeGalaxy()
            ],
            [
                'buy strength', Messages::buySkill('strength', 7)
            ],
        ];

        $fourthBattle = [
            [
                'set-galaxy spiral', Messages::galaxy('spiral')
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    18, 32, 10, 50
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    18, 14, 10, 40
                )
            ],
            [
                'attack', Messages::destroyed('Patrol Spaceship')
            ],
            [
                'grab', Messages::grabPatrolSpaceship()
            ],
            [
                'set-galaxy south', Messages::homeGalaxy()
            ],
            [
                'buy strength', Messages::buySkill('strength', 8)
            ],
        ];

        $fifthBattle = [
            [
                'set-galaxy pegasus', Messages::galaxy('pegasus')
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    20, 30, 10, 50
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    20, 10, 10, 40
                )
            ],
            [
                'attack', Messages::destroyed('Patrol Spaceship')
            ],
            [
                'grab', Messages::grabPatrolSpaceship()
            ],
        ];

        $sixthBattle = [
            [
                'set-galaxy andromeda', Messages::galaxy('andromeda')
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    20, 30, 10, 30
                )
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    20, 10, 10, 20
                )
            ],
            [
                'attack', Messages::destroyed('Patrol Spaceship')
            ],
            [
                'grab', Messages::grabPatrolSpaceship()
            ],
            [
                'set-galaxy east', Messages::homeGalaxy()
            ],
            [
                'buy strength', Messages::buySkill('strength', 9)
            ],
            [
                'buy strength', Messages::buySkill('strength', 10)
            ],
        ];

        $seventhBattle = [
            [
                'set-galaxy spiral', Messages::galaxy('spiral')
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    25, 25, 10, 50
                )
            ],
            [
                'attack', Messages::destroyed('Patrol Spaceship')
            ],
            [
                'grab', Messages::grabPatrolSpaceship()
            ],

            [
                'set-galaxy pegasus', Messages::galaxy('pegasus')
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    25, 25, 10, 40
                )
            ],
            [
                'attack', Messages::destroyed('Patrol Spaceship')
            ],
            [
                'grab', Messages::grabPatrolSpaceship()
            ],

            [
                'set-galaxy spiral', Messages::galaxy('spiral')
            ],
            [
                'attack', Messages::attack(
                    'Patrol Spaceship',
                    25, 25, 10, 30
                )
            ],
            [
                'attack', Messages::destroyed('Patrol Spaceship')
            ],
            [
                'grab', Messages::grabPatrolSpaceship()
            ],
            [
                'set-galaxy home', Messages::homeGalaxy()
            ],
            [
                'stats', Messages::stats([
                    'strength' => 10,
                    'armour' => 4,
                    'luck' => 4,
                    'health' => 60,
                    'hold' => '[ 🔮 🔮 🔮 ]'
                ])
            ],
            [
                'buy armour', Messages::buySkill('armour', 5)
            ],
            [
                'buy armour', Messages::buySkill('armour', 6)
            ],
            [
                'buy armour', Messages::buySkill('armour', 7)
            ],
        ];

        return array_merge(
            [
                [
                    'stats', Messages::stats([
                        'strength' => 4,
                        'armour' => 4,
                        'luck' => 4,
                        'health' => 60,
                        'hold' => '[ _ _ _ ]'
                    ])
                ],
            ],
            $firstBattle,
            [
                [
                    'stats', Messages::stats([
                        'strength' => 4,
                        'armour' => 4,
                        'luck' => 4,
                        'health' => 20,
                        'hold' => '[ 🔮 _ _ ]'
                    ])
                ],
                [
                    'set-galaxy north', Messages::homeGalaxy()
                ],
                [
                    'buy strength', Messages::buySkill('strength', 5)
                ],
                [
                    'stats', Messages::stats([
                        'strength' => 5,
                        'armour' => 4,
                        'luck' => 4,
                        'health' => 60,
                        'hold' => '[ _ _ _ ]'
                    ])
                ]
            ],
            $secondBattle,
            $thirdBattle,
            $fourthBattle,
            $fifthBattle,
            $sixthBattle,
            $seventhBattle
        );
    }
}
