<?php

namespace Lib;

class Log {
    public static function log(string $msg) {
        $file = fopen('test.txt', 'a');
        fwrite($file, $msg.PHP_EOL);
        fclose($file);
    }
}