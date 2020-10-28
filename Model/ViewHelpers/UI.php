<?php

namespace App\Model\ViewHelpers;

/**
 * Classe d'aide à la génération de vues
 */
class UI {
    /**
     * Fonction qui tronque une chaine de caractère à un nombre donné.
     *
     * @param string $string
     * @param integer $number
     * @return string $string
     */
    public static function truncate($string, $number)
    {
        if (strlen($string) > $number) {
            $string = substr($string, 0, $number);
            $last_space = strrpos($string, " ");
            $string = substr($string, 0, $last_space) . "...";
            return $string;
        }
    }
}