<?php

namespace Bruna\Hospital\Entidades;

use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Marcacao
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToOne(targetEntity:Paciente::class, inversedBy: 'marcacao')]
    public readonly Paciente $paciente;

    public function __construct(
        #[Column]
        public DateTimeImmutable $date
    ) {
    }

    public function setPaciente(Paciente $paciente): void
    {
        $this->paciente = $paciente;
    }
}
