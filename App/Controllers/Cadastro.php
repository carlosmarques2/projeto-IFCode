<?php

namespace App\Controllers;

use App\Models\Proprietario;
use App\Models\QRCode;
use App\Models\Veiculo;
use App\Util\Util;

class Cadastro extends Controller {
    
    public function __construct($router){
        parent::__construct($router);
    }
    
    public function home($data)
    {
        echo $this->view->render("cadastro", [
            "title" => "Cadastro | " . SITE,
            "pagina" => "cadastro",
            "cadastro_invalido" => $data
        ]);
    }

    public function novo($data)
    {
        $proprietario = new Proprietario();
        $proprietario->nome = $data['nome'];
        $proprietario->sobrenome = $data['sobrenome'];
        $proprietario->matricula = $data['matricula'];
        $proprietario->setor = $data['setor'];
        $proprietario->telefone = $data['telefone'];
        $proprietario->funcao = $data['ocupacao'];
        

        if($proprietario->save()) {
            $veiculo = new Veiculo();
            $veiculo->add($proprietario, $data['placa'], $data['modelo'], $data['cor']);

            if(isset($veiculo->id)){
                $qrcode = new QRCode();
                $qrcode->nome_img_qr = 'qrcode-'.$proprietario->id;

                geraQrCode($proprietario->id, $qrcode->nome_img_qr);

                $qrcode->add($proprietario, $qrcode->nome_img_qr);
                $this->router->redirect('web.home');
            } else {
                $proprietario->destroy();
                $this->home($data = [
                    'proprietario' => $proprietario = [
                        'nome' => $data['nome'],
                        'sobrenome' => $data['sobrenome'],
                        'matricula' => $data['matricula'],
                        'setor' => $data['setor'],
                        'telefone' => $data['telefone'],
                        'funcao' => $data['ocupacao']
                    ],
                    'veiculo' => $veiculo = [
                        'placa' => $data['placa'],
                        'modelo' => $data['modelo'],
                        'cor' => $data['cor']],
                    'erro' => 20
                ]);
            }
        } else {
            $this->home($data = [
                'proprietario' => $proprietario = [
                    'nome' => $data['nome'],
                    'sobrenome' => $data['sobrenome'],
                    'matricula' => $data['matricula'],
                    'setor' => $data['setor'],
                    'telefone' => $data['telefone'],
                    'funcao' => $data['ocupacao']
                ],
                'veiculo' => $veiculo = [
                    'placa' => $data['placa'],
                    'modelo' => $data['modelo'],
                    'cor' => $data['cor']],
                'erro' => 10
            ]);
        }
    }

    public function geraQrCode(array $data){
        
        if(empty($data["id"])){
            
            return;
        }

        $url_qr_code = URL_QRCODE.'\\'.$data['id'];
        $nome_img_qr = DIR_QRCODES."\\".$data['nome_img_qr'].'.png';

        if(file_exists($nome_img_qr)){
            $callback["mensagem"] ="Esse proprietário já possui um QRCode";
            echo json_encode($callback);
            return;
        }

        (new Util())->getQrCode()->generate($url_qr_code, $nome_img_qr);
        
        $callback["qrcode-gerado"] = true;
        echo json_encode($callback);
    }
}