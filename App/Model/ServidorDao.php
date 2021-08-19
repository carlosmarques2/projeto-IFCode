<?php

namespace App\Model;
use PDO;
use Exception;

class ServidorDao {
    
    public function create(Servidor $servidor) {
        $sql = "INSERT INTO proprietarios (nome, sobrenome, matricula, funcao, telefone) VALUES (? , ? , ? , ? , ?)";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $servidor->getNome());
        $stmt->bindValue(2, $servidor->getSobrenome());
        $stmt->bindValue(3, $servidor->getMatricula());
        $stmt->bindValue(4, $servidor->getOcupacao());
        $stmt->bindValue(5, $servidor->getTelefone());

        try{
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function read() {
        $sql = "SELECT * FROM proprietarios WHERE funcao = ?;";
    
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, 'Servidor');

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

    public function update(Servidor $servidor) {
        $sql = "UPDATE proprietarios SET nome = ? , sobrenome = ? , matricula = ? , funcao = ? , telefone = ? WHERE id=?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $servidor->getNome());
        $stmt->bindValue(2, $servidor->getSobrenome());
        $stmt->bindValue(3, $servidor->getMatricula());
        $stmt->bindValue(4, $servidor->getOcupacao());
        $stmt->bindValue(5, $servidor->getTelefone());
        $stmt->bindValue(6, $servidor->getId());
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