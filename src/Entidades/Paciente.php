<?php

namespace Bruna\Hospital\Entidades;

use Bruna\Hospital\Repositorio\RepositorioPacienteMedico;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity(RepositorioPacienteMedico::class)]
class Paciente
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToMany(targetEntity: Medico::class, inversedBy: 'paciente')]
    public Collection $medico;

    #[OneToMany(targetEntity:Marcacao::class, mappedBy: 'paciente', cascade: ['persist'])]
    public Collection $marcacao;

    public function __construct(
        #[Column]
        public readonly string $name
    ) {
        $this->medico = new ArrayCollection();
        $this->marcacao = new ArrayCollection();
    }

    public function medico(): Collection
    {
        return $this->medico;
    }
    public function marcaMedico(Medico $medico): void
    {
        if ($this->medico->contains($medico)) {
            return;
        }
        $this->medico->add($medico);
        $medico->addPaciente($this);
    }

    public function setMedico(Medico $medico):void
    {
        $this->medico = $medico;
    }
}
