<?php

/**
 * Usage:
 * $string = 'ARE62RS';
 * $validator = new StringValidator($string);
 * $validator->validateString();
 */

require_once './utils/extractLetter.php';

class StringValidator {
    private string $string;

    private string $legacyPattern;
    private string $newFormatPattern;

    public function __construct(string $string)
    {
        $this->string = $string;
        $this->legacyPattern = '/^(?=.{7}$)[A-Za-z]{3}[0-9]{3}[0-9]$/'; // need to exclude i and o from first three
        $this->newFormatPattern = '/^(?=.{7}$)[A-Za-z]{3}[0-9]{2}[A-Za-z]{2}$/'; // need to exclude i and o from first three
    }

    public function validateString(): void
    {
        if (preg_match($this->legacyPattern, $this->string)) {
            $this->processLegacyString($this->string);
        } elseif (preg_match($this->newFormatPattern, $this->string)) {
            $this->processNewFormatString($this->string);
        } else {
            echo 'NHI Not Valid';
        }
    }

    /**
     * Processes the legacy format NHI string and validates its checksum.
     *
     * @param string $string The legacy format NHI string to process.
     * @return bool Returns true if the NHI is valid, false otherwise.
     */
    private function processLegacyString(string $string): bool
    {
        var_dump('Legacy format process started');

        $nhi = $string;
        $chars = str_split($nhi);

        // Step 1 - Calculate the first letter value from the Alphabet Conversion Table and multiply it by 7.
        $calc1 = extractLetter($chars[0]) * 7;

        // Step 2 - Calculate the second letter value from the Alphabet Conversion Table and multiply it by 6.
        $calc2 = extractLetter($chars[1]) * 6;

        // Step 3 - Calculate the third letter value from the Alphabet Conversion Table and multiply it by 5.
        $calc3 = extractLetter($chars[2]) * 5;

        // Step 4 - Multiply the first number by 4.
        $calc4 = intval($chars[3]) * 4;

        // Step 5 - Multiply the second number by 3.
        $calc5 = intval($chars[4]) * 3;

        // Step 6 - Multiply the third number by 2.
        $calc6 = intval($chars[5]) * 2;

        // Step 7 - Total the results of steps 1 to 6.
        $sum = $calc1 + $calc2 + $calc3 + $calc4 + $calc5 + $calc6;

        // Step 8 - Calculate the remainder when the sum is divided by 11.
        $divisor = 11;
        $rest = $sum % $divisor;

        // Step 9 - Calculate the check digit based on the remainder.
        $check_digit = ($divisor - $rest) === 10 ? 0 : ($divisor - $rest);

        // Step 10 - If the checksum is zero, the NHI number is incorrect.
        if ($check_digit === 0) {
            var_dump('Legacy format failed - NHI not valid'); // Debug
            return false;
        }

        // Step 11 - Get the last digit of the NHI.
        $last_digit = intval($chars[6]);

        // Step 12 - Perform the final check by comparing the last digit with the calculated check digit.
        if ($last_digit !== $check_digit) {
            var_dump('Legacy format failed - NHI not valid'); // Debug
            return false;
        }

        var_dump('Legacy format succeeded - NHI is valid'); // Debug

        return true;
    }

    /**
     * Processes the new format NHI string and validates its checksum.
     *
     * @param string $string The new format NHI string to process.
     * @return bool Returns true if the NHI is valid, false otherwise.
     */
    private function processNewFormatString(string $string): bool
    {
        var_dump('New format process started');

        $nhi = $string;
        $chars = str_split($nhi);

        // Step 1 - Calculate the first letter value from the Alphabet Conversion Table and multiply it by 7.
        $calc1 = extractLetter($chars[0]) * 7;

        // Step 2 - Calculate the second letter value from the Alphabet Conversion Table and multiply it by 6.
        $calc2 = extractLetter($chars[1]) * 6;

        // Step 3 - Calculate the third letter value from the Alphabet Conversion Table and multiply it by 5.
        $calc3 = extractLetter($chars[2]) * 5;

        // Step 4 - Multiply the first number by 4.
        $calc4 = intval($chars[3]) * 4;

        // Step 5 - Multiply the second number by 3.
        $calc5 = intval($chars[4]) * 3;

        // Step 6 - Calculate the third number value from the Alphabet Conversion Table and multiply it by 2.
        $calc6 = extractLetter($chars[5]) * 2;

        // Step 7 - Total the results of steps 1 to 6.
        $sum = $calc1 + $calc2 + $calc3 + $calc4 + $calc5 + $calc6;

        // Step 8 - Calculate the remainder when the sum is divided by 23.
        $divisor = 23;
        $rest = $sum % $divisor;

        // Step 9 - Calculate the check digit based on the remainder.
        $check_digit = $divisor - $rest;

        // Step 10 - Get the last letter value from the Alphabet Conversion Table.
        $last_letter_value = extractLetter($chars[6]);

        // Step 11 - Final check: The last letter value must be equal to the calculated check digit.
        if ($last_letter_value !== $check_digit) {
            var_dump('New format failed - NHI not valid'); // Debug
            return false;
        }

        var_dump('New format succeeded - NHI is valid'); // Debug

        return true;
    }
}

