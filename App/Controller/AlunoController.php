<?php

/**
 * Declaração de namespaces com sub-namespaces:
 * https://www.php.net/manual/pt_BR/language.namespaces.nested.php
 */
namespace App\Controller;

/**
 * Definimos aqui que nossa classe precisa incluir uma classe de outro subnamespace
 * do projeto, no caso a classe Aluno do sub-namespace Model
 */
use App\Model\Aluno;

/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 * Uma classe definida como final não pode ter filhos, ou seja, nenhuma outra classe
 * pode fazer o extends dela, por exemplo: class Teste extends AlunoController.
 * Veja mais sobre final aqui: https://www.php.net/manual/pt_BR/language.oop5.final.php
 */
final class AlunoController
{
    /**
     * Declaração de membros de classe estáticos:
     * https://www.php.net/manual/pt_BR/language.oop5.static.php
     * Note o tipo de retorno void, ou seja, esse método
     * é um procedimento e não tem retorno.
     */
    public static function cadastro() : void
    {
    $aluno = new Aluno();

    // 1. Tratamento do GET (Carregar aluno se vier id na URL)
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_GET['id'])) {
            // É essencial atribuir o retorno do método à variável $aluno
            $aluno = $aluno->getById((int)$_GET['id']);
        }
    }

    // 2. Tratamento do POST (Salvar/Editar)
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $aluno->Id = $_POST["id"] ?? null;
        $aluno->Nome = $_POST["nome"];
        $aluno->RA = $_POST["ra"];
        $aluno->Curso = $_POST["curso"];

        $aluno->salvar();
        header("Location: /aluno");
        exit;
    }

    // 3. Renderizar a View passando a variável $aluno preenchida
    include 'View/Aluno/Form_Aluno.php';


   
    }
    
    public static function listar() : void
    {
        //echo "listagem de alunos";
        $aluno = new Aluno();
        $lista = $aluno->getAllRows();

       // var_dump($lista);
       include VIEWS . "/../View/Aluno/Lista_Aluno.php";
    }    
    public static function delete() : void
    {
        
            $aluno = new Aluno();
            $aluno->delete((int)$_GET['id']);
            header("Location: /aluno");
      
        exit; // Interrompe a execução imediatamente após o redirecionamento
       
    }
}