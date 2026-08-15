<?php
namespace App\Model;
use App\DAO\AlunoDAO;
final class Aluno
{
public $id, $nome, $ra, $curso;

function salvar() : Aluno
    {
        
        return (new AlunoDAO())->save($this);
    }

function getById(int $id) : ?Aluno
    {
        
    
        return (new AlunoDAO())->selectById($id);

    }

function getAllById(int $id) : array
    {
        return (new AlunoDAO())->select();
    }   
    
function delete(int $id) : bool
    {
         return (new AlunoDAO())->delete($id);
    }   

public function getAllRows()
    {
        $dao = new AlunoDAO();
        return $dao->select(); // ou o método de busca equivalente no seu DAO
    }
    
}