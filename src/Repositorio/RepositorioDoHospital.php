<?php

namespace Bruna\Hospital\Repositorio;

use Doctrine\ORM\EntityRepository;


class RepositorioDoHospital extends EntityRepository
{
    public function medicosESuasEspecialidades(): array
    {
        return $this->createQueryBuilder('medico')
            ->addSelect('especialidade')
            ->leftJoin('medico.especialidade', 'especialidade')
            ->getQuery()
            ->getResult();
    }
}