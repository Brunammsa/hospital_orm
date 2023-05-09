<?php

namespace Bruna\Hospital\Entidades;

use DateTime;
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

    #[ManyToOne(targetEntity:Medico::class, inversedBy: 'marcacao')]
    public readonly Medico $medico;

    public function __construct(
        #[Column]
        public DateTime $date
    ) {
    }

    public function setMedico(Medico $medico): void
    {
        $this->medico = $medico;
    }
}
