<?php

class AutoLoader
{
    private $classes = [
        // Traits
        'HasCode' => __DIR__ . '/Traits/HasCode.php',

        // Enums
        'Abilities' => __DIR__ . '/Enums/Abilities.php',
        'Dice' => __DIR__ . '/Enums/Dice.php',

        // Models
        'Alignment' => __DIR__ . '/Models/Alignment.php',
        'ProficiencyBonus' => __DIR__ . '/Models/ProficiencyBonus.php',

        // Contracts
        'Inspiration' => __DIR__ . '/Models/Inspiration.php',
        'Race' => __DIR__ . '/Models/Race.php',
        'AbilityScore' => __DIR__ . '/Models/AbilityScore.php',
        'Background' => __DIR__ . '/Models/Background.php',
        'Level' => __DIR__ . '/Models/Level.php',
        'Character' => __DIR__ . '/Models/Character.php',
        'Roll' => __DIR__ . '/Models/Roll.php',
        'CharacterClass' => __DIR__ . '/Models/CharacterClass.php',

        // Php
        'Collection' => __DIR__ . '/Php/Collection.php',
        'README' => __DIR__ . '/README.md',

        // Abstracts
        'Enum' => __DIR__ . '/Abstracts/Enum.php',
        'Model' => __DIR__ . '/Abstracts/Model.php',
        'AutoLoader' => __DIR__ . '/AutoLoader.php',
    ];

    public function __construct()
    {
        spl_autoload_register(function ($className) {
            $filePath = $this->classes[$className] ?? null;
            if ($filePath) {
                require_once $filePath;
            } else {
                throw new Exception("Failed to locate {$className} in AutoLoader.php");
            }
        });
    }
}

$autoLoader = new AutoLoader();
