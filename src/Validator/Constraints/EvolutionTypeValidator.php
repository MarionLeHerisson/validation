<?php

namespace App\Validator\Constraints;

use App\Evolution\EvolutionDefinitionInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class EvolutionTypeValidator extends ConstraintValidator
{
    public function __construct(
        // This service locator contains many Constraints Builder :
        // `name` => Builder
        private ContainerInterface $definitions,
    ) {}

    public function validate($evolution, Constraint $constraint)
    {
        $type = $evolution->getType() ?? null;

        // Avoid reporting many times the same errors.
        if (!$type) {
            return;
        }

//        dump($this->definitions);
        if (!$this->definitions->has($type)) {
            $this->context
                ->buildViolation('The type "{typeName}" is not valid.')
                ->setParameter('{typeName}', $type)
                ->addViolation()
            ;

            return;
        }

        /** @var $definition EvolutionDefinitionInterface */
        $definition = $this->definitions->get($type);

        $violations = $this->context
            ->getValidator()
            // Without that line, a valid type with invalid options would not be reported.
            ->inContext($this->context) // With this line, it returns a RecursiveContextualValidator
            ->validate($evolution->getOptions(), $definition->getConstraints())
        ;

        dump($violations);
//        dd($this->context);
    }
}