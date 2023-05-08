<?php

namespace Bruna\Hospital\Entidades;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Paciente
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToOne(targetEntity:Medico::class, inversedBy: 'paciente')]
    public readonly Medico $medico;

    public function __construct(
        #[Column]
        public readonly string $name
    ){
    }

    public function setMedico(Medico $medico): void
    {
        $this->medico = $medico;
    }
}