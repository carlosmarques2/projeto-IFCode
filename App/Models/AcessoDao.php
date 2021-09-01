<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class AcessoDao extends DataLayer {
    
    public function __construct()
    {
        parent::__construct("acessos", ['acesso', 'usuario', 'endereco'], "id", false);
    }
    
    public function add(Acesso $acesso):AcessoDao{
        $this->acesso = $acesso->getDataDeAcesso();
        $this->usuario = $acesso->getUsuario();
        $this->endereco = $acesso->getEnderecoIp();

        return $this;
    }
}