<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Trainer
{
    #[Assert\Type('string')]
    #[Assert\Regex(
        pattern: '/\d/',
        message: 'Your name cannot contain a number', 
        match: false,
    )]
    protected string $name;

    #[Assert\AtLeastOneOf([
        new Assert\Length(min: 10),
        new Assert\Email(),
    ])]
    protected string $userName;

    protected array $badges;

    #[Assert\IsFalse]
    protected bool $beatTheLeague;

    #[Assert\Type('string')]
    #[Assert\Length(min: 1, max: 1)]
    protected string $gender;
    
    #[Assert\Country]
    protected string $country;
    // FR, DE, IT
    
    #[Assert\Country(alpha3: true)]
    protected string $countryAlpha3;
    // FRA, DEU, ITA

    #[Assert\Regex('/^\w+/')]
    protected string $description;

    #[Assert\CssColor]
    protected string $defaultColor;
    // red, #369, #A2A2A2, hsla(0, 0%, 20%, 0.4)

    #[Assert\NotCompromisedPassword]
    protected string $rawPassword;
    
    #[Assert\CardScheme(
        schemes: [Assert\CardScheme::AMEX]
    )]
    protected string $cardNumber;
    
    #[Assert\IsNull]
    protected \DateTime $deletedAt;
}