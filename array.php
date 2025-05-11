<?php
$value = [1, 2, 3, 4];

$value[] = 15;
$value[100] = "aduhai";

print_r($value);
echo ("<br/>");
var_dump($value);
var_dump($value[100]);
