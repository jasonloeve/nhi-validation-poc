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
        $this->legacyPattern = '/^(?=.{7}$)[A-Za-z]{3}[0-9]{3}[0-9]$/';
        $this->newFormatPattern = '/^(?=.{7}$)[A-Za-z]{3}[0-9]{2}[A-Za-z]{2}$/';
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
     * Process the legacy format of the NHI (National Health Index) number for validation.
     * The function performs a series of steps to validate the legacy format.
     *
     * @param string $string The NHI number string to be processed and validated.
     * @return bool True if the legacy NHI format is valid, false otherwise.
     */
    private function processLegacyString(string $string): bool
    {
        // var_dump('processLegacyString catch');

        $nhi = $string;
        $chars = str_split($nhi);
        // $chars = preg_split('//', $nhi, -1, PREG_SPLIT_NO_EMPTY);

        // Algorithm mathematical equation
        // A = extractLetter(n[0])
        // B = extractLetter(n[1])
        // C = extractLetter(n[2])
        // S = A*7 + B*6 + C*5 + N1*4 + N2*3 + N3*2
        // D = (24 - (S mod 24)) mod 24

        // Step 1 - Assign first letter its corresponding value from the Alphabet Conversion Table and multiply value by 7
        $calc1 = extractLetter($chars[0]) * 7;

        // Step 2 - Assign second letter its corresponding value from the Alphabet Conversion Table and multiply value by 6.
        $calc2 = extractLetter($chars[1]) * 6;

        // Step 3 - Assign third letter its corresponding value from the Alphabet Conversion Table and multiply value by 5.
        $calc3 = extractLetter($chars[2]) * 5;

        // Step 4 - Multiply first number by 4
        $calc4 = $chars[3] * 4;

        // Step 5 - Multiply second number by 3
        $calc5 = $chars[4] * 3;

        // Step 6 - Multiply third number by 2
        $calc6 = extractLetter($chars[5]) * 2;

        // Step 7 - Total the result of steps 3 to 8
        $sum = $calc1 + $calc2 + $calc3 + $calc4 + $calc5 + $calc6;

        // Step 8 - Apply modulus 24 to create a checksum.
        $divisor = 24;
        $rest = $sum % $divisor;

        // Step 9 - Subtract checksum from 24 to create check digit
        $check_digit = $divisor - $rest;

        // Step 10 - If checksum is zero then the NHI number is incorrect
        if ($check_digit === 0) {
            var_dump('Legacy Failed');
            return false;
        }

        // Step 11 - Fourth number must be equal to check digit
        $last_digit = extractLetter($chars[6]);

        if ($last_digit !== $check_digit) {
            var_dump('Legacy Failed');
            return false;
        }

        var_dump('Legacy Passed');
        return true;
    }

    private function processNewFormatString(string $string): bool
    {
        var_dump('new catch');
        return true;
    }
}

