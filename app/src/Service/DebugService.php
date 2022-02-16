<?php

namespace App\Service;

class DebugService
{


    static public function debug(mixed $data, bool $die = false): void
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";

        if ($die) {
            die;
        }
    }
}