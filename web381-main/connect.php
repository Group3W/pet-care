<?php

$con= new mysqli(
    'localhost',
    'root',
    '',
    'petcare');

if ($con -> connect_error)
    die("Error connecting to database" . $con -> connect_error);
?>