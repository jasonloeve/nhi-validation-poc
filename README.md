# NHI Validation POC (New Zealand National Health Index)

This repository is a proof of concept build aimed at validating NHI numbers using vanilla PHP 8. The purpose of this POC is to demonstrate the validation of both the legacy format and the new format of NHI numbers, which will be implemented starting from October 1, 2025.

The NHI number is a unique identifier assigned to individuals in the healthcare system. It consists of a specific format that needs to be validated for accuracy and compliance. The POC application will provide functionality to validate both the existing legacy format and the upcoming new format of NHI numbers.

By using vanilla PHP 8, the POC ensures a lightweight and efficient implementation without any external dependencies. The application will employ regular expressions or custom validation logic to verify the correctness of NHI numbers according to the specified formats.

The key objectives of this POC include:

1. Implementing a validation mechanism for legacy format NHI numbers.
2. Incorporating validation rules for the new format of NHI numbers, which will be effective from October 1, 2025.
3. Ensuring accurate and reliable validation of NHI numbers using appropriate algorithms and techniques.
4. Providing clear and informative validation feedback to users, indicating whether an NHI number is valid or invalid.
5. Offering a foundation for future enhancements, such as integration with existing healthcare systems or user interfaces.

The POC aims to demonstrate the feasibility and effectiveness of the NHI number validation process in PHP 8. It serves as a starting point for further development and integration efforts to support the validation of NHI numbers in real-world healthcare applications.

## Unit Tests

$ vendor/bin/phpunit tests/LetterExtractorTest.php

$ vendor/bin/phpunit tests/StringValidatorTest.php