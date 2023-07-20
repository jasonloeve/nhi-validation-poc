<?php

/**
 * Documentation -https://www.tewhatuora.govt.nz/our-health-system/eligibility-for-publicly-funded-health-services/national-health-index/nhi-number-format-changes/#:~:text=1%20October%202025.-,What%20are%20the%20format%20changes%3F,issued%20from%201%20October%202025.
 * TODO: Write the following tests:
 * - Test for string that is too short
 * - Test for string that is too long
 * - Test for legacy format that is incorrect
 * - Test for new format that is incorrect
 * - Test for legacy format that is correct
 * - Test for new format that is correct
 *
 * Samples of correct formats:
 * Legacy: ZAA0024
 * New: ARE62RS
 */

require_once './StringValidator.php';

// Example usage:
$string = 'ZAA0025';
$validator = new StringValidator($string);

// Validate the NHI string and check if it's valid
$validator->validateString();

// The validateString() method will display a debug message indicating whether the NHI is valid or not.
// If the NHI is valid, it will display a message like "Legacy format succeeded - NHI is valid" or "New format succeeded - NHI is valid".
// If the NHI is not valid or does not match any format, it will display "NHI Not Valid".
