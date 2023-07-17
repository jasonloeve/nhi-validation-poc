<?php

/**
 * Get the assigned number for a given letter.
 *
 * @param string $letter The letter for which the assigned number is needed.
 * @return int
 */
function extractLetter(string $letter): int
{
    $letter = strtoupper($letter); // Convert the letter to uppercase for consistency

    $assignedNumbers = [
        'A' => 1,
        'B' => 2,
        'C' => 3,
        'D' => 4,
        'E' => 5,
        'F' => 6,
        'G' => 7,
        'H' => 8,
        'J' => 9,
        'K' => 10,
        'L' => 11,
        'M' => 12,
        'N' => 13,
        'P' => 14,
        'Q' => 15,
        'R' => 16,
        'S' => 17,
        'T' => 18,
        'U' => 19,
        'V' => 20,
        'W' => 21,
        'X' => 22,
        'Y' => 23,
        'Z' => 24,
    ];

    return $assignedNumbers[$letter] ?? 0;
}
