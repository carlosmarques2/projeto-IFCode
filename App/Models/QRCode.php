<?php

namespace App\Models;

class QRCode{
    private $id;
    private string $codigoDecriptado;
    private Proprietario $proprietario;

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
    public function setCodigoDecriptado(string $codigoDecriptado)
    {
        $this->codigoDecriptado = $codigoDecriptado;

        return $this;
    }

    /**
     * Get the value of proprietario
     */ 
    public function getProprietario()
    {
        return $this->proprietario;
    }

    /**
     * Set the value of proprietario
     *
     * @return  self
     */ 
    public function setProprietario(Proprietario $proprietario)
    {
        $this->proprietario = $proprietario;

        return $this;
    }
}