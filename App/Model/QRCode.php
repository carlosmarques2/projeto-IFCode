<?php

namespace App\Model;

class QRCode{
    private $id;
    private $codigoDecriptado;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of codigoDecriptado
     */ 
    public function getCodigoDecriptado()
    {
        return $this->codigoDecriptado;
    }

    /**
     * Set the value of codigoDecriptado
     *
     * @return  self
     */ 
    public function setCodigoDecriptado($codigoDecriptado)
    {
        $this->codigoDecriptado = $codigoDecriptado;

        return $this;
    }
}