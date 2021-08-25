<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class ProprietarioDao extends DataLayer {
    
    public function __construct()
    {
        parent::__construct('proprietarios', ['nome', 'sobrenome', 'matricula', 'funcao', 'setor', 'telefone'], 'id', false);
    }

    public function veiculos(){
        return (new VeiculoDao())->find("id_prop = :id", "id={$this->id}")->fetch(true);
    }
}