<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class QRCode extends DataLayer {

    public function __construct()
    {
        parent::__construct('qrcode', ['id_prop', 'nome_do_arquivo', 'diretorio'], 'id', false);
    }

    public function add(Proprietario $proprietario, string $nome_do_arquivo, $diretorio):QRCode{
        $this->id_prop = $proprietario->id;
        $this->nome_do_arquivo = $nome_do_arquivo;
        $this->diretorio = $diretorio;

        $this->save();

        return $this;
    }
}