<?php

function biodata(string $name, int $age)
{
    return [
        'name' => $name,
        'age' => $age,
        'address' => 'Jl. Perana Kp. Babakan Jampang RT. 02/18',
        'hobbies' => ['Film', 'Membaca', 'Koding'],
        'is_married' => false,
        'list_school' => [
            new School('SDN Tugu Jaya 1', 2008, 2014, null),
            new School('SMPN 9 Sukabumi', 2014, 2017, null),
            new School('SMKN 2 Sukabumi', 2017, 2020, 'Rekayasa Perangkat Lunak')
        ],
        'skills' => [
            new Skill('PHP', 'beginner'),
            new Skill('Codeigniter', 'beginner'),
            new Skill('Laravel', 'beginner')
        ],
        'interest_in_coding' => true
    ];
}
class School {
    var $name, $year_in, $year_out, $major;

    function __construct($name , $year_in, $year_out, $major)
    {
        $this->name = $name;
        $this->year_in = $year_in;
        $this->year_out = $year_out;
        $this->major = $major;
    }
}
class Skill {
    var $skill_name, $level;

    function __construct($skill_name, $level)
    {
        $this->skill_name = $skill_name;
        $this->level = $level;
    }
}
echo json_encode(biodata('Muhamad Abiyasa Sastra Wardana', 17));