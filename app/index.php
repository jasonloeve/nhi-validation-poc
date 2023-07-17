<?php

/*
Documentation -https://www.tewhatuora.govt.nz/our-health-system/eligibility-for-publicly-funded-health-services/national-health-index/nhi-number-format-changes/#:~:text=1%20October%202025.-,What%20are%20the%20format%20changes%3F,issued%20from%201%20October%202025.
TODO: Write the following tests:
- Test for string that is too short
- Test for string that is too long
- Test for legacy format that is incorrect
- Test for new format that is incorrect
- Test for legacy format that is correct
- Test for new format that is correct

Samples of correct formats:
Legacy: ZAA0024
New: ARE62RS
*/

$string = 'ARE62RS';
$legacyPattern = '/^(?=.{7}$)[A-Za-z]{3}[0-9]{3}[0-9]$/';
$newFormatPattern = '/^(?=.{7}$)[A-Za-z]{3}[0-9]{2}[A-Za-z]{2}$/';

if (preg_match($legacyPattern, $string)) {
    processLegacyString($string);
} elseif (preg_match($newFormatPattern, $string)) {
    processNewFormatString($string);
} else {
    echo 'NHI Not Valid';
}

// Function to process legacy format string
function processLegacyString($string) {
    echo 'Legacy NHI Valid';
    // Perform legacy format logic here
}

// Function to process new format string
function processNewFormatString($string) {
    echo 'New Format NHI Valid';
    // Perform new format logic here
}


