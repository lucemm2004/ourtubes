<?php

namespace App\Utilities;


class Utils
{
    function nettoyer_donnee($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
