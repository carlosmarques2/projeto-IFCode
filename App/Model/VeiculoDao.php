<?php

namespace App\Model;
use PDO;
use Exception;

class VeiculoDao {
    
    public function create(Veiculo $veic) {
        $sql = "INSERT INTO veiculos (id_prop, placa, modelo, cor) VALUES (? , ? , ? , ?)";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $veic->getProprietario()->getId());
        $stmt->bindValue(2, $veic->getPlaca());
        $stmt->bindValue(3, $veic->getModelo());
        $stmt->bindValue(4, $veic->getCor());

        try{
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function read() {
        $sql = "SELECT * FROM veiculos;";
    
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

    public function update(Veiculo $veic) {
        $sql = "UPDATE veiculos SET id_prop = ? , placa = ? , modelo = ? , cor = ? WHERE id=?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $veic->getProprietario()->getId());
        $stmt->bindValue(2, $veic->getPlaca());
        $stmt->bindValue(3, $veic->getModelo());
        $stmt->bindValue(4, $veic->getCor());
        $stmt->bindValue(6, $veic->getId());
        try {
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM veiculos WHERE id=?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        try {
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }
}