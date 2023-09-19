<?php

class Sanitize {
    public static function sanitizeString($input) {
        // Remove tags and special characters
        $sanitizedString = strip_tags($input);
        $sanitizedString = htmlspecialchars($sanitizedString, ENT_QUOTES, 'UTF-8');

        // Additional sanitization steps if needed

        return $sanitizedString;
    }

    public static function sanitizeEmail($input) {
        // Sanitize and validate email address
        $sanitizedEmail = filter_var($input, FILTER_SANITIZE_EMAIL);

        // Additional validation steps if needed

        return $sanitizedEmail;
    }

    public static function sanitizeInteger($input) {
        // Remove non-digit characters and sanitize
        
        $sanitizedInteger = filter_var($input, FILTER_SANITIZE_NUMBER_INT);

        // Additional validation steps if needed

        return $sanitizedInteger;
    }

    // Add more sanitization methods as per your requirements
}
