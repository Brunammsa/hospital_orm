<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Bruna\Hospital\Entidades\Especialidade;
use Bruna\Hospital\Entidades\Medico;

require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

$repositorioMedico = $gerenciamentoDeEntidade->getRepository(Medico::class);

$listaDeMedicos = $repositorioMedico->medicosESuasEspecialidades();


/**
 * @var Medico[] $listaDeMedeicos
 */
foreach ($listaDeMedicos as $medico) {
    echo "Médico(a): $medico->name";

    if ($medico->especialidade()->count() > 0) {
        echo ' - Especialidade(s): ';
        echo implode(
            ', ',
            $medico->especialidade()
                ->map(fn (Especialidade $especialidade) => $especialidade->name)
                ->toArray()
        );
        echo PHP_EOL . PHP_EOL;
    }
}
