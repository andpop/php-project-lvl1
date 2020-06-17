<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\GameRunner\runGame;

const MAX_NUMBER = 100;
const OPERATIONS = ['+', '-', '*'];
const GAME_DESCRIPTION = 'What is the result of the expression?';

function runCalcGame()
{
    $getGuess = function () {
        $guess = [];

        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $number1 = rand(1, MAX_NUMBER);
        $number2 = rand(1, MAX_NUMBER);
        $statement = "$number1 $operation $number2";
        $operator= "\$correctAnswer = $number1 $operation $number2;";
        
        eval($operator);
        $guess['correctAnswer'] = $correctAnswer; 

        line("Question: %s", $statement);
        $answer = prompt('Your answer');
        $answer = (int)$answer;

        $guess['answer'] = $answer;
        $guess['isCorrectAnswer'] = ($answer === $correctAnswer);

        return $guess;
    };
    
    runGame(GAME_DESCRIPTION, $getGuess);
}
