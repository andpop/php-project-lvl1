<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

const TRY_COUNT = 3;

function isEven($number)
{
    return ($num % 2) === 0;
}

function getName()
{
    return prompt('May I have your name?');
}

function showDescription()
{
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('');
}

function showGreeting($name)
{
    line("Hello, %s!", $name);
}

function run()
{
    showDescription();
    $name = getName();
    showGreeting($name);
}
