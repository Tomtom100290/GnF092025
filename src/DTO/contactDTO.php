<?php
namespace App\DTO;
use Symfony\Component\Validator\Constraints as Assert;

class contactDTO
{
    // ci dessous les conditions
    #[Assert\NotBlank] // Pour que le champs ne soit pas vude     
    #[Assert\Length(min: 3, max:200)]   //Ici une contrainte de longueur de caractères   
    public string $name ='';

    #[Assert\NotBlank] // Pour que le champs ne soit pas vude     
    #[Assert\Email]   
    public string $email ='';

    #[Assert\NotBlank] // Pour que le champs ne soit pas vude     
    #[Assert\Length(min: 3, max:800)]   //Ici une contrainte de longueur de caractères  
    public string $message ='';
}