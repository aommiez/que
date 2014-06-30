<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/29/14
 * Time: 5:47 PM
 */

// This is only an example, the numbers below will
// differ depending on your system

echo memory_get_usage(true) . "\n"; // 36640

$a = str_repeat("Hello", 4242);

echo memory_get_usage(true) . "\n"; // 57960

unset($a);

echo memory_get_usage(true) . "\n"; // 36744

?>