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

    public function qrCodes(){
        return (new QRCodeDao())->find("id_prop = :id", "id={$this->id}")->fetch(true);
    }

    public function add(Proprietario $prop):ProprietarioDao{
        $this->nome = $prop->getNome();
        $this->sobrenome = $prop->getSobrenome();
        $this->matricula = $prop->getMatricula();
        $this->funcao = $prop->getOcupacao();
        $this->setor = $prop->getSetor();
        $this->telefone = $prop->getTelefone();

        return $this;
    }
}

// args da função add
// string $nome, string $sobrenome, string $matricula, string $funcao, string $setor, string $telefone