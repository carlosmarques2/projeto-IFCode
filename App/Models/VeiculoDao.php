<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class VeiculoDao extends DataLayer {
    
    public function __construct()
    {
        parent::__construct('veiculos', ['id_prop', 'placa', 'modelo', 'cor'], 'id', false);
    }

    public function add(ProprietarioDao $proprietario, string $placa, string $modelo, string $cor):VeiculoDao
    {
        $this->id_prop = $proprietario->id;
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->cor = $cor;

        return $this;
    }
}