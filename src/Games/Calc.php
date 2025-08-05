<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What is the result of the expression?';

function calculate(int $number1, int $number2, string $operator): ?int
{
    switch ($operator) {
        case '+':
            $result =  $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        case '*':
            $result = $number1 * $number2;
            break;
        default:
            $result = null;
    }

    return $result;
}

function prepareGameData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $number1 = random_int(1, 10);
        $number2 = random_int(1, 10);

        $operators = ['+', '-', '*'];
        $operator = $operators[random_int(0, count($operators) - 1)];

        $question = "{$number1} {$operator} {$number2}";
        $answer = (string) calculate($number1, $number2, $operator);

        $data[] = [$question, $answer];
    }

    return $data;
}

function startBrainCalcGame(): void
{
    $data = prepareGameData();

    startGame($data, DESCRIPTION);
}
