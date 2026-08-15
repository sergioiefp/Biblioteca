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
        return ($model->id==null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Aluno $model) : Aluno
    {
        $sql = "INSERT INTO aluno (nome, ra, curso) VALUES (:nome, :ra, :curso)";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':nome', $model->nome);
        $stmt->bindValue(':ra', $model->ra);
        $stmt->bindValue(':curso', $model->curso);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();

        return $model;

    }
  public function update(Aluno $model) : Aluno
    {
     $sql = "UPDATE aluno SET nome=:nome, ra=:ra, curso=:curso WHERE id=:id";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':nome', $model->nome);
        $stmt->bindValue(':ra', $model->ra);
        $stmt->bindValue(':curso', $model->curso);
        $stmt->bindValue(':id', $model->id);
        $stmt->execute();


        return $model;
    }
      public function selectById(Aluno $model) : ?Aluno
    {
         $sql = "SELECT * FROM aluno WHERE id=:id";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(':id', $model->id);
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
      public function delete(int $id) : bool
    {
        $sql = "DELETE FROM aluno WHERE id=:id";
        $stmt = parent::$conexao->prepare($sql);
        return $stmt->execute();
              
    }
}