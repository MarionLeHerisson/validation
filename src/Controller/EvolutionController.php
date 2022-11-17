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
        $levelData = [
            'type' => 'level',
            'options' => [
                'level' => 32,
            ],
        ];

        $stoneData = [
            'type' => 'stone',
            'options' => [
                'stones' => [
                    1,
                    'fire',
                    'electric',
                ],
            ],
        ];

        $tradeData = [
            'type' => 'trade',
            'options' => [
                'was_traded' => true,
                'holding_item' => true,
                'item' => 'ocean teeth',
//                'stone' => 'water', // This would trigger an error
            ],
        ];

        $complexData = [
            'type' => 'complex',
            'options' => [
                'was_traded' => true,
                'items' => [
                    1,
                    'ocean teeth',
                    'ocean scale',
                    new Request(),
                ],
            ],
        ];

        $invalidData = [
            'type' => 'stone',
            'options' => [
                'stones' => 42,
            ],
        ];
        
        $eeveeEvolution = new Evolution();

        /** Replace the evolution below with one of the examples above **/
//        $eeveeEvolution->setType($levelData['type']);
//        $eeveeEvolution->setOptions($levelData['options']);

//        $eeveeEvolution->setType($stoneData['type']);
//        $eeveeEvolution->setOptions($stoneData['options']);

//        $eeveeEvolution->setType($tradeData['type']);
//        $eeveeEvolution->setOptions($tradeData['options']);

        $eeveeEvolution->setType($invalidData['type']);
        $eeveeEvolution->setOptions($invalidData['options']);

        $violations = $validator->validate($eeveeEvolution);

dump($violations);
        return $this->render('pokemon/evolve.html.twig', [
            'violations' => $violations,
        ]);
    }
}

/*
These are valid inputs :

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
