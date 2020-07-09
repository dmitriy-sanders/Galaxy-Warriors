<?php

namespace BinaryStudioAcademy\Game\Helpers;

final class Config
{
    const SPACESHIPS = [
        'patrol' => [
            'name' => 'Patrol Spaceship',
        ],
        'battle' => [
            'name' => 'Battle Spaceship',
        ],
        'executor' => [
            'name' => 'Executor',
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
}