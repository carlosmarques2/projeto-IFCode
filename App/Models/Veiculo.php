<?php

namespace App\Models;

use App\Models\Proprietario;
use CoffeeCode\DataLayer\DataLayer;

class Veiculo extends DataLayer {
    
    public function __construct()
    {
        parent::__construct('veiculos', ['id_prop', 'placa', 'modelo', 'cor'], 'id', false);
    }

    public function add(Proprietario $prorietario, string $placa, string $modelo, string $cor):Veiculo
    {
        $this->id_prop = $prorietario->id;
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->cor = $cor;

        $this->save();
        return $this;
    }

    public function save():bool {
        /**
         * Verifica se o numero da placa já existe na base de dados
         */
        if(count((array)$this->find("placa = :placa", "placa={$this->placa}", 'placa')->fetch(true)))
           return false;
        else
            return parent::save();
    }
}