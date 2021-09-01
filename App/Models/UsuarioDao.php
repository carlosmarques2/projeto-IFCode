<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;

class UsuarioDao extends DataLayer {

    public function __construct()
    {
        parent::__construct('usuarios', ['nome', 'usuario', 'senha', 'email', 'nivel', 'ativo', 'cadastro'], 'id', false);
    }

    public function add(Usuario $user):UsuarioDao{
        $this->nome = $user->getNome(); 
        $this->usuario = $user->getUsuario();
        $this->senha = $user->getSenha();
        // $this->email = $user->getEmail();
        $this->nivel = $user->getNivel();
        $this->ativo = $user->getAtivo();
        
        return $this;
    }
}