<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class QRCodeDao extends DataLayer {

    public function __construct()
    {
        parent::__construct('qrcode', ['id_prop','codigo_decriptado'], 'id', false);
    }

    public function add(QRCode $qrcode):QRCodeDao{
        $this->id_prop = $qrcode->getProprietario()->getId();
        $this->codigo_decriptado = $qrcode->getCodigoDecriptado();

        return $this;
    }
}