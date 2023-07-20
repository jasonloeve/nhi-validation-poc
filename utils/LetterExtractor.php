<?php

class LetterExtractor
{
    private array $assignedNumbers;

    public function __construct()
    {
        // Initialize the assignedNumbers array
        $this->assignedNumbers = [
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
    }

    /**
     * Extracts the numerical value associated with a given letter.
     *
     * @param string $letter The letter for which to extract the numerical value.
     * @return int Returns the numerical value of the letter. Returns 0 if the letter is not found in the assignedNumbers array.
     */
    public function extractLetter(string $letter): int
    {
        $letter = strtoupper($letter); // Convert the letter to uppercase for consistency

        return $this->assignedNumbers[$letter] ?? 0;
    }
}
