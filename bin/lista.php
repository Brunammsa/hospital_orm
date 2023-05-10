<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;
use Bruna\Hospital\Entidades\Especialidade;
use Bruna\Hospital\Entidades\Marcacao;
use Bruna\Hospital\Entidades\Medico;
use Bruna\Hospital\Entidades\Paciente;

require_once __DIR__ . './../vendor/autoload.php';

$gerenciamentoDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

$repositorioMedico = $gerenciamentoDeEntidade->getRepository(Medico::class);
$listaDeMedicos = $repositorioMedico->medicosESuasEspecialidades();

$repositorioPaciente = $gerenciamentoDeEntidade->getRepository(Paciente::class);
$listaDePacientes = $repositorioPaciente->pacientesEMedicos();

$repositorioMarcacao = $gerenciamentoDeEntidade->getRepository(Marcacao::class);
$listaDeMarcacoes = $repositorioMarcacao->marcacaoPacienteMedico();


$validacao = false;
while (!$validacao) {
    echo "Dentre as opções abaixo, digite a que deseja listar:\n
    - Para médicos/especialidades digite ESPECIALIDADE
    - Para médicos/pacientes, digite PACIENTE
    - Para marcações, digite MARCAÇÃO" . PHP_EOL;

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
                        ->toArray()
                );
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
                        ->toArray()
                );
            }
            echo PHP_EOL . PHP_EOL;
        }
    } elseif (strtoupper($respostaMenu) == 'MARCAÇÃO') {
        /**
         * @var Marcacao[] $listaDeMarcacoes
         */
        foreach ($repositorioMarcacao as $marcacao) {
            echo $marcacao;
            
        }
    }

    $encerrar = trim(readline('Para encerrar digite SAIR ou enter para continuar: '));
    if (strtoupper($encerrar) == 'SAIR') {
        $validacao = true;
    }
}
