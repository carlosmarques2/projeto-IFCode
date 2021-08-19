<?php

namespace App\Model;

use Exception;
use PDO;

class AcessoDao {
    
    public function create(Acesso $acesso) {
        $sql = 'INSERT INTO acessos (data_de_acesso, usuario, endereco_ip) VALUES (?, ?, ?);';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $acesso->getDataDeAcesso());
        $stmt->bindValue(2, $acesso->getUsuario());
        $stmt->bindValue(3, $acesso->getEnderecoIp());

        try{
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function read() {
        $sql = "SELECT DATE_FORMAT(acesso,'%d/%m/%Y %H:%i') AS dataFormatada, usuario, endereco FROM acessos;";

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

    public function update(Acesso $acesso) {
        $sql = "UPDATE acessos SET data_de_acesso = ?, usuario = ?, endereco_ip = ? WHERE id = ?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $acesso->getDataDeAcesso());
        $stmt->bindValue(2, $acesso->getUsuario());
        $stmt->bindValue(3, $acesso->getEnderecoIp());
        $stmt->bindValue(4, $acesso->getId());
        try {
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM acessos WHERE id=?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        try {
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }
}