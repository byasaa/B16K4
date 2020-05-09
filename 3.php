<?php

function count_vowels($word)
{
    echo preg_match_all('/[aeiou]/i',$word,$matches);
}

echo (count_vowels('aiu'));