<?php
$array = range(1, 8);
shuffle($array);
echo $array[0];
$_COOKIE[] = [];
if (isset($_GET['text'])){
    $text = $_GET['text'];
    echo "\n Text = ".$text;
}