<?php

namespace App\Controllers;

use App\Models\Acesso;
use App\Models\Proprietario;
use App\Models\QRCode;
use App\Models\Usuario;
use App\Models\Veiculo;

require __DIR__ . "../../../vendor/autoload.php";

class Web extends Controller
{   

    public function __construct($router){
        parent::__construct($router);
    }

    public function home($data):void
    {

        echo $this->view->render("home", [
            "title" => "Home | " . SITE,
            "numero_de_proprietarios" => (new Proprietario())->find()->count(),
            "pagina" => "home",
            "notificacao" => $data ? true : false
        ]);
    }

    public function editar($data)
    {
        echo $this->view->render("editar_proprietario", [
            "title" => "Editar Proprietário | " . SITE,
            "pagina" => "lista"
        ]);
    }

    public function listaVeiculos($data)
    {
        $veiculos = (new Veiculo())->find()->order('modelo')->fetch(true);

        echo $this->view->render("lista_veiculos", [
            "title" => "Lista de Veículos | " . SITE,
            "veiculos" => $veiculos,
            "pagina" => "lista-veiculo"
        ]);
    }

    public function listaQrcodes($data)
    {   
        
        $qrcodes = (new QRCode())->find()->fetch(true);

        echo $this->view->render("lista_qrcodes", [
            "title" => "Lista de QR Codes | " . SITE,
            "qrcodes" => $qrcodes,
            "pagina" => "qrcodes"
        ]);
    }

    public function painel($data)
    {
        $acessos = (new Acesso())->find()->fetch(true);
        $usuarios = (new Usuario())->find()->fetch(true);

        echo $this->view->render("painel", [
            "title" => "Painel Admin | " . SITE,
            "acessos" => $acessos,
            "usuarios" => $usuarios,
            "pagina" => "painel"
        ]);
    }

    public function rotaTest($data){
        dd($data);
    }

    public function error(array $data)
    {
        echo $this->view->render("error", [
            "title" => "Error {$data['errcode']} | " . SITE,
            "error" => $data["errcode"],
            "message" => [
                '401' => ER401,
                '404' => ER404,
                '501' => ER501,
                '409' => ER409,
                'default' => 'Algo está errado!'
            ]
        ]);
    }
}
