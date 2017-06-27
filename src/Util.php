<?php

namespace Botchka;

/**
 * Class Util
 * @package Botchka
 * @author Joost Mul <joost@jmul.net>
 *
 * Utility class used by the Botchka IRC bot.
 */
final class Util
{
    /**
     * Returns the requested value form the array with the given value as key. If the key is not set, the default will
     * be returned
     *
     * @param array       $array
     * @param mixed|array $values
     * @param mixed       $default
     * @return mixed
     */
    public static function arrayGet($array, $values, $default = null)
    {
        if (!is_array($values)) {
            $values = [$values];
        }

        $cur = $array;
        foreach ($values as $value) {
            if (isset($cur[$value])) {
                $cur = $cur[$value];
            } else {
                return $default;
            }
        }

        return $cur;
    }
}