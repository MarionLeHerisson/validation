<?php

namespace App\Controller;

use App\Entity\Evolution;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class EvolutionController extends AbstractController
{
    #[Route('/evolve', name: 'evolve')]
    public function evolve(Request $request, ValidatorInterface $validator): Response
    {
        $levelEvolution = [
            'type' => 'level',
            'options' => [
                'level' => 'FOO',
            ],
        ];

        $stoneEvolution = [
            'type' => 'stone',
            'options' => [
                'stones' => [
                    'water',
                    'fire',
                    'electric',
                ],
            ],
        ];

        $invalidEvolution = [
            'type' => 'tototot',
            'options' => [
                'answer' => 42,
            ],
        ];
        
        $evoliEvolution = new Evolution();
        $evoliEvolution->setType($stoneEvolution['type']);
        $evoliEvolution->setOptions($stoneEvolution['options']);

        $violations = $validator->validate($evoliEvolution);

        if (sizeof($violations) > 0) {
            dump($violations[0]->getMessage());
            dd($violations);
        }
        else {
            dd("Valid evolution, yay \o/");
        }
    }
}

/*
These are valid options :

{
    "type": "level",
    "options": {
        "level": 36
    }
}

{
    "type": "stone",
    "options": {
        "stones": [
            "water",
            "fire",
            "electric",
        ]
    }
}

 */
