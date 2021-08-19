<?php

use App\Model\Usuario;
use App\Model\UsuarioDao;

require_once 'vendor/autoload.php';

// $usuario = new Usuario();

// $usuario->setNome("Fulano");
// $usuario->setUsuario("Fulanin");
// $usuario->setSenha(password_hash("12345", PASSWORD_BCRYPT));
// $usuario->setNivel(1);
// $usuario->setAtivo(1);

// echo var_dump($usuario);
// echo '<br><br>';

$usuarioDao = new UsuarioDao();
$user = new Usuario();
// $usuarioDao->create($usuario);

foreach($usuarioDao->read() as $usuario){
    if($usuario['id'] == 9){
        $user->setId($usuario['id']);
        $user->setNome($usuario['nome']);
        $user->setUsuario($usuario['usuario']);
        $user->setSenha($usuario['senha']);
        $user->setNivel($usuario['nivel']);
        $user->setAtivo($usuario['ativo']);
        $user->setDataDeDadastro($usuario['dataFormatada']);
        break;
    }
}
echo var_dump($user);