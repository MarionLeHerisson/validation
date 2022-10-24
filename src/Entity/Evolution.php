<?php

namespace App\Entity;

use App\Validator\Constraints as CustomAssert;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[CustomAssert\EvolutionType]
class Evolution
{
    private const EVOLUTION_TYPES = [
        'level',
        'stone',
        'ev',
        'trade',
    ];
    
    private const AVAILABLE_STONES = [
        'water',
        'fire',
        'plant',
        'electric',
    ];

    #[Assert\NotBlank]
    #[Assert\Choice(choices: self::EVOLUTION_TYPES)]
    public string $type;

    public array $options = [];

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }
/*
    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context): void
    {
//        dump($context);
        // Avoid PHP errors and also reporting the same errors many times.
        if (!isset($this->type) || !\in_array($this->type, self::EVOLUTION_TYPES, true)) {
            return;
        }

        // Get a group of constraints for each `type` value
        $constraints = match ($this->type) {
            'level' => $this->getLevelConstraints(),
            'stone' => $this->getStoneConstraints(),
            'ev' => $this->getEvConstraints(),
            'trade' => $this->getTradeConstraints(),
            default => throw new \UnexpectedValueException(),
        };

        // All the magic occurs here!
        // We create a new validator, but in the very same context
        // And we suffix the `options` path
        $context
            ->getValidator()
            ->inContext($context)
            ->atPath('options')
            ->validate($this->options, $constraints)
        ;
    }

    private function getLevelConstraints(): array
    {
        return [
            // Since options should be an array, we use the `Collection` constraints
            // By default, all fields are required, so NotBlank are not required here
            new Assert\Collection([
                'level' => [
                    new Assert\Type('int'),
                ],
            ]),
        ];
    }

    private function getStoneConstraints(): array
    {
        return [
            // Since options should be an array, we use the `Collection` constraints
            // By default, all fields are required, so NotBlank are not required here
            new Assert\Collection([
                'stones' => [
                    new Assert\Collection([
                        new Assert\Type('string'),
                    ])
                ],
            ]),
        ];
    }

    private function getEvConstraints(): array
    {
        return [
            ... 
        ];
    }

    private function getTradeConstraints(): array
    {
        return [
            ... 
        ];
    }
*/
}
