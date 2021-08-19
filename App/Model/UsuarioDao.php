<?php

namespace App\Model;

use Exception;
use PDO;

class UsuarioDao {
    
    public function create(Usuario $usuario) {
        $sql = 'INSERT INTO usuarios (nome, usuario, senha, nivel, ativo, cadastro) VALUES (?, ?, ?, 1, 0, NOW());';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $usuario->getNome());
        $stmt->bindValue(2, $usuario->getUsuario());
        $stmt->bindValue(3, $usuario->getSenha());

        try{
            $stmt->execute();
        } catch (Exception $ex){
            echo $ex;
        }
    }

    public function read() {
        $sql = "SELECT id, nome, usuario, senha, nivel, ativo, DATE_FORMAT(cadastro,'%d/%m/%Y %H:%i') AS dataFormatada FROM usuarios WHERE nivel=1;";

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

    public function update(Usuario $usuario) {
        $sql = "UPDATE usuarios SET nome = ?, usuario = ?, senha = ?, ativo = ? WHERE id = ?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $usuario->getNome());
        $stmt->bindValue(2, $usuario->getUsuario());
        $stmt->bindValue(3, $usuario->getSenha());
        $stmt->bindValue(4, $usuario->getAtivo());
        $stmt->bindValue(5, $usuario->getId());
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