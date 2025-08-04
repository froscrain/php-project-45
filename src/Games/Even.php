<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function prepareGameData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $question = random_int(1, 100);
        $answer = isEven($question) ? 'yes' : 'no';

        $data[] = [$question, $answer];
    }

    return $data;
}

function startBrainEvenGame(): void
{
    $data = prepareGameData();

    startGame($data, DESCRIPTION);
}
