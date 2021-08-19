<?php

namespace App\Model;
use PDO;
use Exception;

class ProprietarioDao {
    
    public function create(Proprietario $prop) {
        $sql = "INSERT INTO proprietarios (nome, sobrenome, matricula, funcao, telefone) VALUES (? , ? , ? , ? , ?)";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $prop->getNome());
        $stmt->bindValue(2, $prop->getSobrenome());
        $stmt->bindValue(3, $prop->getMatricula());
        $stmt->bindValue(4, $prop->getOcupacao());
        $stmt->bindValue(5, $prop->getTelefone());

        try{
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function read() {
        $sql = "SELECT * FROM proprietarios;";

        $stmt = Conexao::getConn()->prepare($sql);

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

    public function update(Proprietario $prop) {
        $sql = "UPDATE proprietarios SET nome = ? , sobrenome = ? , matricula = ? , funcao = ? , telefone = ? WHERE id=?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $prop->getNome());
        $stmt->bindValue(2, $prop->getSobrenome());
        $stmt->bindValue(3, $prop->getMatricula());
        $stmt->bindValue(4, $prop->getOcupacao());
        $stmt->bindValue(5, $prop->getTelefone());
        $stmt->bindValue(6, $prop->getId());
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