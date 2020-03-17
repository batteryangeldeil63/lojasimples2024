<?php

function compress_html($buffer){

    $search = array(
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s'
    );

    $replace = array(
        '>',
        '<',
        '\\1'
    );

    $buffer = str_replace('à', '&agrave;', $buffer);
    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

ob_start('compress_html');