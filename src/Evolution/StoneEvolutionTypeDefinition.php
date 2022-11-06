<?php

namespace App\Evolution;

use Symfony\Component\Validator\Constraints as Assert;

class StoneEvolutionTypeDefinition implements EvolutionDefinitionInterface
{
    public static function getType(): string
    {
        return 'stone';
    }

    public function getConstraints(): array
    {
        return [
            new Assert\Collection([
                'stones' => [
                    new Assert\All([
                        new Assert\Type('string'),
                    ]),
                ],
            ]),
        ];
    }
}
