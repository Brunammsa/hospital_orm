<?php

namespace Bruna\Hospital\Entidades;

use Bruna\Hospital\Repositorio\RepositorioDoHospital;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity(RepositorioDoHospital::class)]
class Medico
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToMany(targetEntity: Especialidade::class, mappedBy: 'medico')]
    private Collection $especialidade;

    public function __construct(
        #[Column]
        public readonly string $name
    ) {
        $this->especialidade = new ArrayCollection();
    }

    public function especialidade(): Collection
    {
        return $this->especialidade;
    }

    public function addEspecialidade(Especialidade $especialidade): void
    {
        if ($this->especialidade->contains($especialidade)) {
            return;
        }

        $this->especialidade->add($especialidade);
        $especialidade->cadastraMedico($this);
    }
}
