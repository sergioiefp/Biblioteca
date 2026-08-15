<?php

/**
 * Para saber mais sobre namespaces:
 * https://www.php.net/manual/pt_BR/language.namespaces.rationale.php
 */
use App\Controller\AlunoController;

/* Para saber mais sobre a função 
 * parse_url: https://www.php.net/manual/pt_BR/function.parse-url.php
 */
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/**
 * Para saber mais estrutura switch,
 * leia: https://www.php.net/manual/pt_BR/control-structures.switch.php
 */
switch($url)
{
    case '/':
        echo "página inicial";
    break;

    case '/aluno':
        /**
         * Para saber mais sobre o Operador de Resolução de Escopo (::), 
         * leia: https://www.php.net/manual/pt_BR/language.oop5.paamayim-nekudotayim.php
         */
        AlunoController::listar();
    break;

    case '/aluno/cadastro':
        AlunoController::cadastro();
    break;
}