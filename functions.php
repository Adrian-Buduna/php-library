<?php

function dd($data)
{
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
