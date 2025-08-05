<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_SIZE = 10;

function createProgression(int $firstNumber, int $step, int $size): array
{
    $progression = [];

    for ($i = 0; $i < $size; $i++) {
        $progression[] = $firstNumber + $i * $step;
    }

    return $progression;
}

function prepareGameData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $firstNumber = random_int(1, 10);
        $step = random_int(1, 10);

        $progression = createProgression($firstNumber, $step, PROGRESSION_SIZE);

        $hiddenItemIndex = random_int(0, PROGRESSION_SIZE - 1);
        $answer = (string) $progression[$hiddenItemIndex];

        $progression[$hiddenItemIndex] = '..';
        $question = implode(' ', $progression);

        $data[] = [$question, $answer];
    }

    return $data;
}

function startBrainProgressionGame(): void
{
    $data = prepareGameData();

    startGame($data, DESCRIPTION);
}
