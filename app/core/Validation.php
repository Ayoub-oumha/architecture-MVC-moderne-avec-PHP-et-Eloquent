<?php
namespace App\core;

class Validation {
    private $errors = [];

    // Validate required fields
    public function required($field, $value) {
        if (empty($value)) {
            $this->errors[$field] = "{$field} is required.";
        }
    }

    // Validate email format
    public function email($field, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = "{$field} must be a valid email address.";
        }
    }

    // Validate minimum length
    public function minLength($field, $value, $min) {
        if (strlen($value) < $min) {
            $this->errors[$field] = "{$field} must be at least {$min} characters long.";
        }
    }

    // Validate if two fields match
    public function match($field, $value, $confirmation) {
        if ($value !== $confirmation) {
            $this->errors[$field] = "{$field} does not match.";
        }
    }

    // Get validation errors
    public function getErrors() {
        return $this->errors;
    }

    // Check if validation passed
    public function passes() {
        return empty($this->errors);
    }
}