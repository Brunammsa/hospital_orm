<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Bruna\Hospital\Entidades\Especialidade;
use Bruna\Hospital\Entidades\Medico;
use Bruna\Hospital\Entidades\Paciente;

require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

$repositorioMedico = $gerenciamentoDeEntidade->getRepository(Medico::class);
$listaDeMedicos = $repositorioMedico->medicosESuasEspecialidades();

$repositorioPaciente = $gerenciamentoDeEntidade->getRepository(Paciente::class);
$listaDePacientes = $repositorioPaciente->pacientesEMedicos();


$validacao = false;
while (!$validacao) {
    echo 'Para exibir a lista de médicos/especialidades digite ESPECIALIDADE, se prefere médicos/pacientes, digite PACIENTE' . PHP_EOL;
    $respostaMenu = trim(readline(''));

    if (strtoupper($respostaMenu) == 'ESPECIALIDADE') {
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
                        ->toArray());
            }
            echo PHP_EOL . PHP_EOL;
        }

    } elseif (strtoupper($respostaMenu) == 'PACIENTE') {
                /**
         * @var Paciente[] $listaDePacientes
         */
        foreach ($listaDePacientes as $paciente) {
            echo "Paciente: $paciente->name";
            if ($paciente->medico()->count() > 0) {
                echo ' - Medico(s): ';
                echo implode(
                    ', ',
                    $paciente->medico()
                        ->map(fn (Medico $medico) => $medico->name)
                        ->toArray());
            }
            echo PHP_EOL . PHP_EOL;
        }
    }

    $encerrar = trim(readline('Para encerrar digite SAIR ou enter para continuar: '));
    if (strtoupper($encerrar) == 'SAIR') {
        $validacao = true;
    }
}