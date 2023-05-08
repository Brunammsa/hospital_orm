<?php

namespace Bruna\Hospital\Entidades;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity]
class Especialidade
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToMany(targetEntity: Medico::class, inversedBy: 'especialidade')]
    public Collection $medico;

    public function __construct(
        #[Column]
        public string $name
    ) {
        $this->medico = new ArrayCollection();
    }

    /**
     * @return Collection<Medico>
     */
    public function medico(): Collection
    {
        return $this->medico;
    }

    public function cadastraMedico(Medico $medico): void
    {
        if ($this->medico->contains($medico)) {
            return;
        }

        $this->medico->add($medico);
        $medico->addEspecialidade($this);
    }
}
