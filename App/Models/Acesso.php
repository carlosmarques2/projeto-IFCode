<?php

namespace App\Models;

class Acesso {
    private $id;
    private $dataDeAcesso;
    private $usuario;
    private $enderecoIp;

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
     * Get the value of dataDeAcesso
     */ 
    public function getDataDeAcesso()
    {
        return $this->dataDeAcesso;
    }

    /**
     * Set the value of dataDeAcesso
     *
     * @return  self
     */ 
    public function setDataDeAcesso($dataDeAcesso)
    {
        $this->dataDeAcesso = $dataDeAcesso;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of enderecoIp
     */ 
    public function getEnderecoIp()
    {
        return $this->enderecoIp;
    }

    /**
     * Set the value of enderecoIp
     *
     * @return  self
     */ 
    public function setEnderecoIp($enderecoIp)
    {
        $this->enderecoIp = $enderecoIp;

        return $this;
    }
}