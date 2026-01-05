<?php
if (!function_exists('show_value')) {
    function show_value($value, $separator = ', ')
    {
        // If it's a string and looks like JSON, decode it
        if (is_string($value) && str_starts_with(trim($value), '[')) {
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $value = $decoded;
            }
        }

        // If it's an array, implode
        if (is_array($value)) {
            $value = array_filter($value); // remove empty/null
            return count($value) ? implode($separator, $value) : '-';
        }

        return $value;
    }
}
