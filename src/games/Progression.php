<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\GameRunner\runGame;

const MAX_START_PROGRESSION = 100;
const MAX_DELTA_PROGRESSION = 10;
const PROGRESSION_LENGTH = 10;
const GAME_DESCRIPTION = 'What number is missing in the progression?';

function getProgression()
{
    $result = [];
    $start = rand(1, MAX_START_PROGRESSION);
    $delta = rand(1, MAX_DELTA_PROGRESSION);

    $result[] = $start;
    for ($i = 1; $i < PROGRESSION_LENGTH; $i++) {
        $result[] = $start + $i * $delta;
    }

    return $result;
}

function progressionToString($progression, $hidedIndex)
{
    $result = '';
    for ($i = 0; $i < count($progression); $i++) {
        if ($i !== $hidedIndex) {
            $result .= $progression[$i] . ' ';
        } else {
            $result .= '..' . ' ';
        }
    }

    return $result;
}

function runProgressionGame()
{
    $getGuess = function () {
        $guess = [];

        $progression = getProgression();
        $hidedIndex = rand(0, count($progression) - 1);

        $correctAnswer = $progression[$hidedIndex];
        $guess['correctAnswer'] = $correctAnswer;

        $question = progressionToString($progression, $hidedIndex);
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        $answer = (int)$answer;

        $guess['answer'] = $answer;
        $guess['isCorrectAnswer'] = ($answer === $correctAnswer);

        return $guess;
    };
    
    runGame(GAME_DESCRIPTION, $getGuess);
}
