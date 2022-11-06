<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_CLASS)] // WHERE to use it
class ContainsAlphanumeric extends Constraint
{
    public $message = 'The string "{{ string }}" is invalid.';
    
    public $path = 'name';

    public function getTargets(): array|string
    {
        return self::CLASS_CONSTRAINT;  // WHAT it applies to
    }

    public function validatedBy(): string
    {
        return static::class.'Validator';
    }
}
