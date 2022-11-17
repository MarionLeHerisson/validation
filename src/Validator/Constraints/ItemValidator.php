<?php

namespace App\Validator\Constraints;

use App\Evolution\EvolutionDefinitionInterface;
use phpDocumentor\Reflection\Utils;
use Psr\Container\ContainerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ItemValidator extends ConstraintValidator
{
    public function validate($evolution, Constraint $constraint)
    {        
        $itemConstraint = new Item();

        $violations = $this->context
            ->getValidator()
            ->inContext($this->context) // With this line, it returns a RecursiveContextualValidator
            ->validate($evolution->getOptions()['items'])
        ;

//        dump($violations);
//        dd($this->context);
        
        return $violations;
    }
}