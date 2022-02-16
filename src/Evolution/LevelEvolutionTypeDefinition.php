<?php

namespace App\Evolution;

use Symfony\Component\Validator\Constraints as Assert;

class LevelEvolutionTypeDefinition implements EvolutionDefinitionInterface
{
    public static function getType(): string
    {
        return 'level';
    }

    public function getConstraints(): array
    {
        return [
            new Assert\Collection([
                'level' => [
                    new Assert\Type('int'),
                ],
            ]),
        ];
    }
}