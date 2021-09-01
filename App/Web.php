<?php

namespace App;

use App\Models\ProprietarioDao;
use App\Models\QRCodeDao;
use App\Models\VeiculoDao;
use League\Plates\Engine;

require __DIR__."../../vendor/autoload.php";

class Web {

    private $view;

    public function __construct(){
        $this->view = new Engine(__DIR__."./Views", "php");
    }

    public function home($data){
        $proprietarios = (new ProprietarioDao())->find()->fetch(true);
        
        echo $this->view->render("home", [
            "title" => "Home | ".SITE, 
            "proprietarios" => $proprietarios,
            "pagina" => "home"
        ]);
    }

    public function cadastro($data){
        echo $this->view->render("cadastro", [
            "title" => "Cadastro | ".SITE,
            "pagina" => "cadastro"
        ]);
    }

    public function lista($data){
        $proprietarios = (new ProprietarioDao())->find()->fetch(true);
        
        echo $this->view->render("lista", [
            "title" => "Lista de Proprietários | ".SITE, 
            "proprietarios" => $proprietarios,
            "pagina" => "lista"
        ]);
    }

    public function listaVeiculos($data){
        $veiculos = (new VeiculoDao())->find()->fetch(true);
        
        echo $this->view->render("lista_veiculos", [
            "title" => "Lista de Veículos | ".SITE, 
            "veiculos" => $veiculos,
            "pagina" => "lista-veiculo"
        ]);
    }

    public function listaQrcodes($data){
        $qrcodes = (new QRCodeDao())->find()->fetch(true);
        
        echo $this->view->render("lista_qrcodes", [
            "title" => "Lista de QR Codes | ".SITE, 
            "qrcodes" => $qrcodes,
            "pagina" => "qrcodes"
        ]);
    }

    public function painel($data){
        echo "<h1>Web Painel</h1>";
        var_dump($data);
    }

    // public function contact($data){
    //     echo "<h1>Web Contato</h1>";
    //     dd($data);
    //     $url = ROOT;
    //     require __DIR__."/Views/contact.php";
        
    // }

    public function error(array $data){
        echo $this->view->render("error", [
            "title" => "Error {$data['errcode']} | ".SITE, 
            "error" => $data["errcode"],
            "message" => [
                '401' => ER401,
                '404' => ER404,
                '405' => ER405,
                '409' => ER409,
                'default' => 'Algo está errado!'
            ]
        ]);
    }

}