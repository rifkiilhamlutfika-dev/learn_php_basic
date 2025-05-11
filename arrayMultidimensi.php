<?php

$herbivora = ["sapi", "kambing", "kerbau"];
$karnivora = ["harimau", "singa", "serigala"];
$omnivora = ["ayam", "monyet", "babi"];

$animals = [
    "herbivora" => $herbivora,
    "karnivora" => $karnivora,
    "omnivora" => $omnivora
];

echo $animals['omnivora'][0];
