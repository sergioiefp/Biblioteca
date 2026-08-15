<?php
namespace App\Model;
use App\DAO\AlunoDAO;
final class Aluno
{
public $Id, $Nome, $RA, $Curso;

function salvar() : Aluno
    {
        
        return new AlunoDAO()->save($this);
    }

function getById(int $Id) : ?Aluno
    {
        
        $this->Id = $Id;
        return new AlunoDAO()->selectById($this);

    }

function getAllById(int $Id) : array
    {
        return new AlunoDAO()->select();
    }   
    
function delete(int $Id) : bool
    {
         return new AlunoDAO()->delete($Id);
    }   

public function getAllRows(): array
    {
        $dao = new AlunoDAO();
        return $dao->select(); // ou o método de busca equivalente no seu DAO
    }
    
}