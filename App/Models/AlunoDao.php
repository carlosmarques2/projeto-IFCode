<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class AlunoDao extends DataLayer implements ProprietarioDao {
    
    public function __construct()
    {
        parent::__construct('proprietarios', ['nome', 'sobrenome', 'matricula', 'funcao', 'setor', 'telefone'], 'id', false);
    }
}