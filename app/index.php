<?php

/**
 * Documentation -https://www.tewhatuora.govt.nz/our-health-system/eligibility-for-publicly-funded-health-services/national-health-index/nhi-number-format-changes/#:~:text=1%20October%202025.-,What%20are%20the%20format%20changes%3F,issued%20from%201%20October%202025.
 * TODO: Write the following tests:
 *- Test for string that is too short
 * - Test for string that is too long
 * - Test for legacy format that is incorrect
 * - Test for new format that is incorrect
 * - Test for legacy format that is correct
 *- Test for new format that is correct
 *
 * Samples of correct formats:
 * Legacy: ZAA0024
 * New: ARE62RS
 */

require_once 'StringValidator.php';

$string = 'ZZZ0016';
$validator = new StringValidator($string);
$validator->validateString();
