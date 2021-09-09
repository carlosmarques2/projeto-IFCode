<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Acesso extends DataLayer {
    
    public function __construct()
    {
        parent::__construct("acessos", ['acesso', 'usuario', 'endereco'], "id", false);
    }
}