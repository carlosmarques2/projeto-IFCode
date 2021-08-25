<?php

namespace App\Models;

class Veiculo {
    private $id;
    private $placa;
    private $modelo;
    private $cor;
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
     * Get the value of placa
     */ 
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set the value of placa
     *
     * @return  self
     */ 
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get the value of modelo
     */ 
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */ 
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get the value of cor
     */ 
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set the value of cor
     *
     * @return  self
     */ 
    public function setCor($cor)
    {
        $this->cor = $cor;

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