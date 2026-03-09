<?php

namespace App\Services;

use App\Models\FormValidation;

class FormValidationService
{
    /**
     * Validate submitted form data against saved rules.
     * Returns array of errors or empty array if all pass.
     */
    public function validate(string $formId, array $submittedData): array
    {
        $rules = FormValidation::where('form_id', $formId)->get();
        $errors = [];

        foreach ($rules as $rule) {
            $fieldName = $rule->field_name;
            $value = $submittedData[$fieldName] ?? null;

            // Required check
            if ($rule->is_required && empty($value)) {
                $errors[] = [
                    'field'   => $fieldName,
                    'message' => "{$fieldName} is required.",
                ];
                continue;
            }

            // Skip further checks if value is empty and not required
            if (empty($value)) continue;

            // Min length check
            if ($rule->min_length && strlen($value) < $rule->min_length) {
                $errors[] = [
                    'field'   => $fieldName,
                    'message' => "{$fieldName} is too short (minimum is {$rule->min_length} characters).",
                ];
            }

            // Max length check
            if ($rule->max_length && strlen($value) > $rule->max_length) {
                $errors[] = [
                    'field'   => $fieldName,
                    'message' => "{$fieldName} is too long (maximum is {$rule->max_length} characters).",
                ];
            }

            // Email format check
            if ($rule->field_type === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[] = [
                    'field'   => $fieldName,
                    'message' => "{$fieldName} must be a valid email address.",
                ];
            }
        }

        return $errors;
    }
}