<?php

namespace App\Evolution;

use Symfony\Component\Validator\Constraints as Assert;

class TradeEvolutionTypeDefinition implements EvolutionDefinitionInterface
{
    public static function getType(): string
    {
        return 'trade';
    }
    
    public function getConstraints(): array
    {
        return [
            new Assert\Collection([
                'was_traded' => [
                    new Assert\Type('bool'),
                ],
                'holding_object' => [
                    new Assert\Type('bool'),
                ],
                'object' => [
                    new Assert\Type('string'),
                ],
            ]),
        ];
    }
}