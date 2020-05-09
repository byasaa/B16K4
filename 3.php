<?php

function count_vowels($word)
{
    $arr = str_split($word);
    $vocal = ['a','i','u','e','o'];

    $found = array_intersect($vocal, $arr);

    echo $found;
    // $count = array_count_values($arr);

    // $result = [];

    // foreach ($found as $item) {
    //     $result[$item] = $count[$item];
    // }
    // return $result;
}

var_dump(count_vowels('aiu'));