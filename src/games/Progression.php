<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Games\GameRunner\runGame;

const MAX_START_PROGRESSION = 100;
const MAX_DELTA_PROGRESSION = 10;
const PROGRESSION_LENGTH = 10;
const GAME_DESCRIPTION = 'What number is missing in the progression?';

function getProgression($start, $delta)
{
    $result = [];

    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $result[] = $start + $i * $delta;
    }

    return $result;
}

function progressionWithHiddenElementToString($progression, $hidedIndex)
{
    $result = '';
    for ($i = 0; $i < count($progression); $i++) {
        if ($i !== $hidedIndex) {
            $result .= $progression[$i] . ' ';
        } else {
            $result .= '.. ';
        }
    }

    return $result;
}

function runProgressionGame()
{
    $getGuess = function () {
        $guess = [];

        $startElement = rand(1, MAX_START_PROGRESSION);
        $deltaProgression = rand(1, MAX_DELTA_PROGRESSION);
        $progression = getProgression($startElement, $deltaProgression);
        $hidedIndex = rand(0, count($progression) - 1);

        $guess['question'] = progressionWithHiddenElementToString($progression, $hidedIndex);
        $guess['correctAnswer'] = (string)$progression[$hidedIndex];
        
        return $guess;
    };
    
    runGame(GAME_DESCRIPTION, $getGuess);
}
