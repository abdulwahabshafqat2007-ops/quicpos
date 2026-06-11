<?php
// tests/ContactFormTest.php
// Test cases for Contact Form Validation
// PHPUnit: php vendor/bin/phpunit tests/ContactFormTest.php

use PHPUnit\Framework\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * Test 1: Empty Name Field Should Fail
     * [POS-201] Validate required name field
     */
    public function testEmptyNameFieldValidation()
    {
        $name = '';
        $email = 'test@example.com';
        $message = 'Test message';
        
        $isValid = !empty($name) && !empty($email) && !empty($message);
        
        $this->assertFalse($isValid, 'Form should reject empty name field');
    }

    /**
     * Test 2: Empty Email Field Should Fail
     * [POS-202] Validate required email field
     */
    public function testEmptyEmailFieldValidation()
    {
        $name = 'John Doe';
        $email = '';
        $message = 'Test message';
        
        $isValid = !empty($name) && !empty($email) && !empty($message);
        
        $this->assertFalse($isValid, 'Form should reject empty email field');
    }

    /**
     * Test 3: Empty Message Field Should Fail
     * [POS-203] Validate required message field
     */
    public function testEmptyMessageFieldValidation()
    {
        $name = 'John Doe';
        $email = 'test@example.com';
        $message = '';
        
        $isValid = !empty($name) && !empty($email) && !empty($message);
        
        $this->assertFalse($isValid, 'Form should reject empty message field');
    }

    /**
     * Test 4: Invalid Email Format Should Fail
     * [POS-204] Validate email format
     */
    public function testInvalidEmailFormatValidation()
    {
        $name = 'John Doe';
        $email = 'invalid-email';
        $message = 'Test message';
        
        $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        
        $this->assertFalse($isValidEmail, 'Form should reject invalid email format');
    }

    /**
     * Test 5: Valid Form Data Should Pass
     * [POS-205] All fields correct - form submission success
     */
    public function testValidFormDataSubmission()
    {
        $name = 'John Doe';
        $email = 'john@example.com';
        $message = 'This is a valid test message';
        
        $isValid = !empty($name) && 
                   !empty($email) && 
                   !empty($message) && 
                   filter_var($email, FILTER_VALIDATE_EMAIL);
        
        $this->assertTrue($isValid, 'Form should accept valid data');
    }

    /**
     * Test 6: Email with Special Characters
     * [POS-206] Validate email with allowed special chars
     */
    public function testEmailWithSpecialCharacters()
    {
        $email = 'user.name+tag@example.co.uk';
        $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        
        $this->assertTrue($isValidEmail, 'Email with special characters should be valid');
    }

    /**
     * Test 7: Multiple Invalid Emails
     * [POS-207] Data-driven test for invalid emails
     */
    public function testMultipleInvalidEmails()
    {
        $invalidEmails = [
            'plaintext',
            '@example.com',
            'user@',
            'user@.com',
            'user @example.com',
        ];

        foreach ($invalidEmails as $email) {
            $this->assertFalse(
                filter_var($email, FILTER_VALIDATE_EMAIL),
                "Email '$email' should be invalid"
            );
        }
    }
}
?>