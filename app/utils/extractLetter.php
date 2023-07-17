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


//Consider using ASCII
///**
// * Get the assigned number for a given letter.
// *
// * This function takes a letter as input and returns the corresponding assigned number.
// * The letter is converted to uppercase for consistency.
// * The assigned numbers are mapped using a lookup table based on the letter's ASCII value.
// * If the letter is not valid or falls outside the range of assigned numbers, 0 is returned.
// *
// * @param string $letter The letter for which the assigned number is needed.
// * @return int The assigned number for the letter, or 0 if the letter is invalid or out of range.
// */
//function extractLetter(string $letter): int
//{
//    $letter = strtoupper($letter);
//    $ascii = ord($letter);
//    $assignedNumber = $ascii - 64;
//
//    if ($assignedNumber > 9) {
//        $assignedNumber--;
//    }
//
//    return ($assignedNumber >= 1 && $assignedNumber <= 24) ? $assignedNumber : 0;
//}
