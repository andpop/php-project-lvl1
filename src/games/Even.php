<?php

namespace BrainGames\Games\Even;

use function BrainGames\Games\GameRunner\runGame;

const MAX_NUMBER = 100;
const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{
    return ($number % 2) === 0;
}

function runEvenGame()
{
    $getGuess = function () {
        $guess = [];
        $number = rand(1, MAX_NUMBER);
        $guess['question'] = (string)$number;
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $guess['correctAnswer'] = $correctAnswer;

        return $guess;
    };
    
    runGame(GAME_DESCRIPTION, $getGuess);
}
