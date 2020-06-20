<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Games\GameRunner\runGame;

const MAX_NUMBER = 100;
const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}

function runGcdGame()
{
    $getGuess = function () {
        $guess = [];

        $number1 = rand(1, MAX_NUMBER);
        $number2 = rand(1, MAX_NUMBER);

        $guess['question'] = "{$number1} {$number2}";
        $correctAnswer = gcd($number1, $number2);
        $guess['correctAnswer'] = (string)$correctAnswer;

        return $guess;
    };
    
    runGame(GAME_DESCRIPTION, $getGuess);
}
