<?php

namespace App\Controllers;

use App\Models\Proprietario;
use App\Util\Util;

class Lista extends Controller {
    
    public function __construct($router){
        parent::__construct($router);
    }

    public function home($data)
    {
        $proprietarios = (new Proprietario())->find()->order('nome')->fetch(true);

        echo $this->view->render("lista", [
            "title" => "Lista de Proprietários | " . SITE,
            "proprietarios" => $proprietarios,
            "pagina" => "lista"
        ]);
    }

    public function proprietario($data)
    {
        /**
         * Realiza uma consulta em proprietarios passando o id
         */
        $proprietario = (new Proprietario())->findById($data['id']);

        $veiculos = $proprietario->veiculos();


        echo $this->view->render("proprietario", [
            "title" => "Informações do Proprietário | " . SITE,
            "proprietario" => $proprietario,
            "veiculos" => $veiculos,
            "pagina" => "lista"
        ]);
    }

    /**
     * Exibe a pagina acessada via QR Code contendo as principais informações de contato com o proprietario
     */
    public function viewByQrCode($data)
    {
        $proprietario = (new Proprietario())->findById($data['id']);

        echo $this->view->render("qr_proprietario", [
            "title" => "Consulta de Dados | " . SITE,
            "proprietario" => $proprietario
        ]);
    }

    function verificaQrCodes($data){
        $proprietarios = (new Proprietario())->find()->fetch(true);
        foreach($proprietarios as $proprietario){
            if(!file_exists(DIR_QRCODES.'\qrcode-'.$proprietario->id.'.png'))
                geraQrCode($proprietario->id, 'qrcode-'.$proprietario->id);
        }
        // $callback["num_qrcodes"] = $cont;
        // echo json_encode($callback);
    }
}