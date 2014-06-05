<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/5/14
 * Time: 10:14 AM
 */

function asset($path){
    return $path;
}

function tis620_to_utf8($text) {
    $utf8 = "";
    for ($i = 0; $i < strlen($text); $i++) {
        $a = substr($text, $i, 1);
        $val = ord($a);

        if ($val < 0x80) {
            $utf8 .= $a;
        } elseif ((0xA1 <= $val && $val < 0xDA) || (0xDF <= $val && $val <= 0xFB)) {
            $unicode = 0x0E00+$val-0xA0; $utf8 .= chr(0xE0 | ($unicode >> 12));
            $utf8 .= chr(0x80 | (($unicode >> 6) & 0x3F));
            $utf8 .= chr(0x80 | ($unicode & 0x3F));
        }
    }
    return $utf8;
}