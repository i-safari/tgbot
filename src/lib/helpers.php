<?php

namespace Devcom\Payamgir\lib;


//Normalize Arabic Characters to Persian
function TextNormalization($text)
{
    $text = str_replace(["ي", "ك", "ى"], ["ی", "ک", "ی"], $text);
}

//Normalize Any Number to English Number
function NumberNormalization($number)
{
    $search = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
    $search2 = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
    $replace = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $number = str_replace($search, $replace, $number);
    $number = str_replace($search2, $replace, $number);

    return $number;
}

function ll($data)
{
    error_log(print_r($data, true));
}

function lle($data)
{
    ll($data);
    exit;
}

function rand_hash($n)
{
    return bin2hex(random_bytes($n));
}
