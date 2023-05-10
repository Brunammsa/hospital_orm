<?php

namespace Bruna\Hospital\Repositorio;

use Doctrine\ORM\EntityRepository;

class RepositorioMarcacao extends EntityRepository
{
    public function marcacaoPacienteMedico(): array
    {
        return $this->createQueryBuilder('marcacao')
            ->addSelect('paciente')
            ->addSelect('medico')
            ->leftJoin('marcacao.paciente', 'paciente')
            ->leftJoin('marcacao.medico', 'medico')
            ->getQuery()
            ->getResult();
    }
}