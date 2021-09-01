<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class AdministradorDao extends DataLayer implements UsuarioDao {

    public function __construct()
    {
        parent::__construct('usuarios', ['nome', 'usuario', 'senha', 'email', 'nivel', 'ativo', 'cadastro'], 'id', false);
    }
}