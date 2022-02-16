<?php

namespace App\Controller;

use App\Entity\Attack;
use App\Entity\Pokemon;
use App\Form\PokemonType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ExampleController extends AbstractController
{
    #[Route('/pokemon', name: 'create_pokemon')]
    public function new(Request $request, ValidatorInterface $validator): Response
    {        
        $attack = new Attack();
        $attack->setName('charge');

        $tortank = new Pokemon();
        $tortank->getAttacks()->add($attack);

        $form = $this->createForm(PokemonType::class, $tortank);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tortank = $form->getData();
            
            $errors = $validator->validate($tortank);
            dump($errors);

            return $this->redirectToRoute('task_success');
        }

        return $this->renderForm('pokemon/new.html.twig', [
            'pokemon' => $form,
        ]);
    }
    
    #[Route('/different_validations', name: 'different_validations')]
    public function anotherExample(Request $request): Response
    {
        
    }
}
