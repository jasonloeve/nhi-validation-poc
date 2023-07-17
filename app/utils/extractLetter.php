<?php

/**
 * Convert a letter to a numeric value for the checksum.
 *
 * @param string $c Character to validate
 * @return int
 */

function extractLetter(string $c): int
{
    $c = strtolower($c);
    $ascii1 = ord($c);

    // I and O are removed from the Alphabet for readability, dirty hack to account for that
    if ($ascii1 > 105) {
        if ($ascii1 > 111) {
            $ascii1 = $ascii1-2;
        } else {
            $ascii1 = $ascii1-1;
        }
    }

    return $ascii1 - 96;
}
