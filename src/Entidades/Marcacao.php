<?php

namespace Bruna\Hospital\Entidades;

use Bruna\Hospital\Repositorio\RepositorioMarcacao;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity(RepositorioMarcacao::class)]
class Marcacao
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToOne(targetEntity:Paciente::class, inversedBy: 'marcacao')]
    public readonly Paciente $paciente;

    #[ManyToOne(targetEntity: Medico::class, inversedBy: 'marcacao')]
    public readonly Medico $medico;

    public function __construct(
        #[Column]
        public DateTime $date
    ) {
    }

    public function setPaciente(Paciente $paciente): void
    {
        $this->paciente = $paciente;
    }

    public function setMedico(Medico $medico): void
    {
        $this->medico = $medico;
    }
}
