<?php

namespace App\Model;
use PDO;
use Exception;

class AlunoDao {
    
    public function create(Aluno $aluno) {
        $sql = "INSERT INTO proprietarios (nome, sobrenome, matricula, funcao, telefone) VALUES (? , ? , ? , ? , ?)";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $aluno->getNome());
        $stmt->bindValue(2, $aluno->getSobrenome());
        $stmt->bindValue(3, $aluno->getMatricula());
        $stmt->bindValue(4, $aluno->getOcupacao());
        $stmt->bindValue(5, $aluno->getTelefone());

        try{
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function read() {
        $sql = "SELECT * FROM proprietarios WHERE funcao = ?;";
    
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, 'Aluno');

        try {
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }
        } catch (Exception $ex){
            echo $ex;
        }
        
    }

    public function update(Aluno $aluno) {
        $sql = "UPDATE proprietarios SET nome = ? , sobrenome = ? , matricula = ? , funcao = ? , telefone = ? WHERE id=?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $aluno->getNome());
        $stmt->bindValue(2, $aluno->getSobrenome());
        $stmt->bindValue(3, $aluno->getMatricula());
        $stmt->bindValue(4, $aluno->getOcupacao());
        $stmt->bindValue(5, $aluno->getTelefone());
        $stmt->bindValue(6, $aluno->getId());
        try {
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM proprietarios WHERE id=?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        try {
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }
}