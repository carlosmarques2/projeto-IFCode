<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Administrador extends DataLayer implements Usuario {

    public function __construct()
    {
        parent::__construct('usuarios', ['nome', 'usuario', 'senha', 'email', 'nivel', 'ativo', 'cadastro'], 'id', false);
    }
}