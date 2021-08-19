<?php

namespace App\Model;

class AdministradorDao {
    
    public function create(Administrador $admin) {
        $sql = "INSERT INTO usuarios (nome, usuario, senha, nivel, ativo, cadastro) VALUES (?, ?, ?, 1, 0, NOW());";
    }

    public function read() {

    }

    public function update(Administrador $admin) {

    }

    public function delete($id) {

    }
}