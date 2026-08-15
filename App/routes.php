<?php
use App\Controller\AlunoController;
$url=parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch ($url) {
    case "/":
        echo "Página Inicial";
        break;
    case "/aluno":
        
       AlunoController::listar();
        break;
    case "/aluno/registo":
        ;
        AlunoController::registo();
        break;
    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}
