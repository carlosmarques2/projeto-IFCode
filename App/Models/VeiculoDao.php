<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class VeiculoDao extends DataLayer {
    
    public function __construct()
    {
        parent::__construct('veiculos', ['id_prop', 'placa', 'modelo', 'cor'], 'id', false);
    }

    public function add(Veiculo $veic):VeiculoDao
    {
        $this->id_prop = $veic->getProprietario()->getId();
        $this->placa = $veic->getPlaca();
        $this->modelo = $veic->getModelo();
        $this->cor = $veic->getCor();

        return $this;
    }
}