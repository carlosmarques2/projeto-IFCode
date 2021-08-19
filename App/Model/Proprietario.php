<?php

namespace App\Model;

abstract class Proprietario{
    private $id;
    private $nome;
    private $sobrenome;
    private $matricula;
    private $setor;
    private $telefone;
    private $ocupacao;
    private $veiculo;
    private $qrCode;
    


    public function __construct(){
        $this->qrCode = new QRCode();
        // array_push($this->veiculo, new Veiculo());
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
    public function setNome($nome)
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
    public function setSobrenome($sobrenome)
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
    public function setMatricula($matricula)
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
    public function setSetor($setor)
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
    public function setTelefone($telefone)
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
    public function setOcupacao($ocupacao)
    {
        $this->ocupacao = $ocupacao;

        return $this;
    }

    /**
     * Get the value of veiculo
     */ 
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     * Set the value of veiculo
     *
     * @return  self
     */ 
    public function setVeiculo(Veiculo $veiculo)
    {
        array_push($this->veiculo, $veiculo);

        return $this;
    }

    /**
     * Get the value of qrCode
     */ 
    public function getQrCode()
    {
        return $this->qrCode;
    }

    /**
     * Set the value of qrCode
     *
     * @return  self
     */ 
    public function setQrCode(QRCode $qrCode)
    {
        $this->qrCode = $qrCode;

        return $this;
    }
}