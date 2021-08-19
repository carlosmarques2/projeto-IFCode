<?php

namespace App\Model;
use PDO;
use Exception;

class AdministradorDao {
    
    public function create(Administrador $admin) {
        $sql = 'INSERT INTO usuarios (nome, usuario, senha, nivel, ativo, cadastro) VALUES (?, ?, ?, 2, 1, NOW());';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $admin->getNome());
        $stmt->bindValue(2, $admin->getUsuario());
        $stmt->bindValue(3, $admin->getSenha());

        try{
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function read() {
        $sql = "SELECT id, nome, usuario, senha, nivel, ativo, DATE_FORMAT(cadastro,'%d/%m/%Y %H:%i') AS dataFormatada FROM usuarios WHERE nivel=2;";

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

    public function update(Administrador $admin) {
        $sql = "UPDATE usuarios SET nome = ?, usuario = ?, senha = ?, ativo = ? WHERE id = ?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $admin->getNome());
        $stmt->bindValue(2, $admin->getUsuario());
        $stmt->bindValue(3, $admin->getSenha());
        $stmt->bindValue(4, $admin->getAtivo());
        $stmt->bindValue(5, $admin->getId());
        try {
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM usuarios WHERE id=?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        try {
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }
}