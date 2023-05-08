<?php

use Bruna\Hospital\ConexaoSql\EntidadeDeConexao;

require_once 'vendor/autoload.php';

$gerenciadorDeEntidade = EntidadeDeConexao::gerenciamentoDeConexao();

var_dump($gerenciadorDeEntidade);