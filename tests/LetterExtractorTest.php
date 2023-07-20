<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../utils/LetterExtractor.php';

class LetterExtractorTest extends TestCase
{
    // Test the extractLetter method with valid inputs
    public function testExtractLetterWithValidLetters()
    {
        $extractor = new LetterExtractor();

        // Test a few letters and their corresponding numerical values
        $this->assertEquals(1, $extractor->extractLetter('A'));
        $this->assertEquals(7, $extractor->extractLetter('G'));
        $this->assertEquals(24, $extractor->extractLetter('Z'));
    }

    // Test the extractLetter method with invalid letter
    public function testExtractLetterWithInvalidLetter()
    {
        $extractor = new LetterExtractor();

        // Test an invalid letter
        $this->assertEquals(0, $extractor->extractLetter('I'));
    }
}
