<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class ServidorDao extends DataLayer implements ProprietarioDao {
    
    public function __construct()
    {
        parent::__construct('proprietarios', ['nome', 'sobrenome', 'matricula', 'funcao', 'setor', 'telefone'], 'id', false);
    }
}