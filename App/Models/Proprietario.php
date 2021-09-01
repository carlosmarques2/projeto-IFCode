<?php

namespace App\Models;

abstract class Proprietario{
    private $id;
    private string $nome;
    private string $sobrenome;
    private string $matricula;
    private string $setor;
    private string $telefone;
    private string $ocupacao;
    

    public function __construct(ProprietarioDao $prop){
        $this->id = $prop->id;
        $this->nome = $prop->nome;
        $this->sobrenome = $prop->sobrenome;
        $this->matricula = $prop->matricula;
        $this->setor = $prop->setor;
        $this->telefone = $prop->telefone;
        $this->ocupacao = $prop->funcao;
    }

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
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome(string $nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of sobrenome
     */ 
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * Set the value of sobrenome
     *
     * @return  self
     */ 
    public function setSobrenome(string $sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    /**
     * Get the value of matricula
     */ 
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */ 
    public function setMatricula(string $matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get the value of setor
     */ 
    public function getSetor()
    {
        return $this->setor;
    }

    /**
     * Set the value of setor
     *
     * @return  self
     */ 
    public function setSetor(string $setor)
    {
        $this->setor = $setor;

        return $this;
    }

    /**
     * Get the value of telefone
     */ 
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */ 
    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of ocupacao
     */ 
    public function getOcupacao()
    {
        return $this->ocupacao;
    }

    /**
     * Set the value of ocupacao
     *
     * @return  self
     */ 
    public function setOcupacao(string $ocupacao)
    {
        $this->ocupacao = $ocupacao;

        return $this;
    }

}