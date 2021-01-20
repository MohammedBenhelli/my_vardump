<?php

require('./my_vardump.php');

$test = [
    'test',
    [['test'],['test'],['test'],['test'],['test'],['test']],
    1,
    1.11111111111,
    true,
    [[[true, false, 2.2222, 2]]]
];

foreach($test as $t) {
    my_vardump($t);
    var_dump($t);
}