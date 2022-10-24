<?php

namespace App\Entity;

use App\Enum\Elements;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity]
#[Assert\EnableAutoMapping()]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private string $id;

    #[Assert\NotBlank]
    #[Assert\Length(
        min: 3,
        max: 10
    )]
    #[ORM\Column(type: "string", length: 25)]
    private string $name;

    #[Assert\Choice(
        choices: Elements::ALL_ELEMENTS,  // todo : specify the Element type instead of a static list ? & remove enum
        message: 'This element does not exist !'
    )]
    private string $element;

    private Collection $attacks; // should only contain 4 attacks !

    public function __construct()
    {
        $this->attacks = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getElement(): string
    {
        return $this->element;
    }

    public function setElement(string $element): void
    {
        $this->element = $element;
    }

    public function getAttacks(): Collection
    {
        return $this->attacks;
    }

    public function setAttacks(Collection $attacks): void
    {
        $this->attacks = $attacks;
    }

    public function addAttack(Attack $attack): void
    {
        $this->attacks->add($attack);
    }

    public function removeAttack(Attack $attack): void
    {
        $this->attacks->removeElement($attack);
    }
    
//    #[Assert\Callback]
//    public function validate(ExecutionContextInterface $context, $payload): void
//    {
//        // check stuff 
//
//        if (/* some condition */) {
//            $context->buildViolation('Error !')
//                ->atPath('name')
//                ->addViolation();
//        }
//    }
}

// https://symfony.com/doc/current/validation.html#basic-constraints
