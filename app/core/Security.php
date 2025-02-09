<?php
namespace App\core;

class Security {
    // Sanitize input to prevent XSS
    public static function sanitize($input) {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

    // Sanitize array of inputs
    public static function sanitizeArray($inputs) {
        return array_map([self::class, 'sanitize'], $inputs);
    }
}