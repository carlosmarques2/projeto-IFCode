<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Proprietario extends DataLayer {
    
    public function __construct()
    {
        parent::__construct('proprietarios', ['nome', 'sobrenome', 'matricula', 'funcao', 'setor', 'telefone'], 'id', false);
    }

    public function veiculos(){
        return (new Veiculo())->find("id_prop = :id", "id={$this->id}")->fetch(true);
    }

    public function qrCodes(){
        return (new QRCode())->find("id_prop = :id", "id={$this->id}")->fetch(true);
    }

    public function save():bool{

        /**
         * Verifica se o numero de matricula já existe na base de dados
         */
        if(count((array)$this->find("matricula = :matricula", "matricula={$this->matricula}", 'matricula')->fetch(true)))
           return false;
        else
            return parent::save();
            
    }
}