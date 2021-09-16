<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class QRCode extends DataLayer {

    public function __construct()
    {
        parent::__construct('qrcode', ['id_prop', 'nome_img_qr'], 'id', false);
    }

    public function add(Proprietario $proprietario, string $nome_img_qr):QRCode{
        $this->id_prop = $proprietario->id;
        $this->nome_img_qr = $nome_img_qr;

        $this->save();

        return $this;
    }
}