<?php

namespace App\Util;

use App\Models\QRCode;
use SimpleSoftwareIO\QrCode\Generator;

class Util
{

    private $qrCode;

    public function __construct()
    {
        $this->qrCode = new Generator();

        /**
         *
         */
        $this->qrCode->margin(1);
        $this->qrCode->size(189);
        $this->qrCode->style("round");
        $this->qrCode->format('png');
        $this->qrCode->errorCorrection("Q");

        /**
         * Código responsavel pela personalização do QRCode
         */
        $this->qrCode->eyeColor(0, 53, 152, 48, 201, 12, 15);
        $this->qrCode->eyeColor(1, 53, 152, 48, 201, 12, 15);
        $this->qrCode->eyeColor(2, 53, 152, 48, 201, 12, 15);
    }

    

    /**
     * Get the value of qrCode
     */ 
    public function getQrCode():Generator
    {
        return $this->qrCode;
    }
}
