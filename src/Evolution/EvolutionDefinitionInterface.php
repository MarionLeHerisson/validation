<?php

namespace App\Evolution;

interface EvolutionDefinitionInterface
{
    public static function getType(): string;

    public function getConstraints(): array;
}
