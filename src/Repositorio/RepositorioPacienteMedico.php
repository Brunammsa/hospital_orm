<?php

namespace Bruna\Hospital\Repositorio;

use Doctrine\ORM\EntityRepository;

class RepositorioPacienteMedico extends EntityRepository
{
    public function pacientesEMedicos(): array
    {
        return $this->createQueryBuilder('paciente')
        ->addSelect('medico')
        ->leftJoin('paciente.medico', 'medico')
        ->getQuery()
        ->getResult();
    }
}