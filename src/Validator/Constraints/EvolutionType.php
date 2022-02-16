<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

#[\Attribute(\Attribute::TARGET_CLASS)] // WHERE to use it
class EvolutionType extends Constraint
{
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;  // WHAT does it applies to
    }
}