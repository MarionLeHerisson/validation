<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_CLASS)] // WHERE to use it
class ContainsAlphanumeric extends Constraint
{
    public $message = 'The string "{{ string }}" is invalid.';
    
    public $path = 'name';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;  // WHAT does it applies to
    }

    public function validatedBy()
    {
        return static::class.'Validator';
    }
}
