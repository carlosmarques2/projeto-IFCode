<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Aluno extends DataLayer implements Proprietario {
    
    public function __construct()
    {
        parent::__construct('proprietarios', ['nome', 'sobrenome', 'matricula', 'funcao', 'setor', 'telefone'], 'id', false);
    }
}