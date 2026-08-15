<?php
namespace App\DAO;

use App\Model\Aluno;
final class AlunoDAO extends DAO
{
public function __construct()
    {
        parent::__construct();
    }   

public function save(Aluno $model) : Aluno
    {
        return ($model->Id==null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Aluno $model) : Aluno
    {
        $sql = "INSERT INTO aluno (Nome, RA, Curso) VALUES (:nome, :ra, :curso)";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':nome', $model->Nome);
        $stmt->bindValue(':ra', $model->RA);
        $stmt->bindValue(':curso', $model->Curso);
        $stmt->execute();

        $model->Id = parent::$conexao->lastInsertId();

        return $model;

    }
  public function update(Aluno $model) : Aluno
    {
     $sql = "UPDATE aluno SET Nome=:nome, Ra=:ra, Curso=:curso WHERE Id=:id";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':nome', $model->Nome);
        $stmt->bindValue(':ra', $model->RA);
        $stmt->bindValue(':curso', $model->Curso);
        $stmt->bindValue(':id', $model->Id);
        $stmt->execute();


        return $model;
    }
      public function selectById(Aluno $model) : ?Aluno
    {
         $sql = "SELECT * FROM aluno WHERE Id=:id";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $model->Id );
        $stmt->execute();
        

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ? new Aluno($result) : null;

        //diferente
        //return $stmt->fetchObject("App\Model\Aluno");
    }
    public function select() : array
    {
         $sql = "SELECT * FROM aluno";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "App\Model\Aluno");
        
    }
      public function delete(int $Id) : bool
    {
        $sql = "DELETE FROM aluno WHERE id=:id";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $Id);
        return $stmt->execute();
              
    }
}