<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getGcd(int $number1, int $number2): int
{
    while ($number2 !== 0) {
        $remainder = $number1 % $number2;
        $number1 = $number2;
        $number2 = $remainder;
    }

    return $number1;
}

function prepareGameData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);

        $question = "{$number1} {$number2}";
        $answer = (string) getGcd($number1, $number2);

        $data[] = [$question, $answer];
    }

    return $data;
}

function startBrainGcdGame(): void
{
    $data = prepareGameData();

    startGame($data, DESCRIPTION);
}
