<?php

require('./my_vardump.php');

$test = [
    'test',
    [['test'],['test'],['test'],['test'],['test'],['test']],
    1,
    1.11111111111,
    true,
    [[]]
];

foreach($test as $t) {
    my_vardump($t);
    var_dump($t);
}