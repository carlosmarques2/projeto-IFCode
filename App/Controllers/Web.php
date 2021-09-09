<?php

namespace App\Controllers;


use App\Models\Acesso;
use App\Models\Proprietario;
use App\Models\QRCode;
use App\Models\Usuario;
use App\Models\Veiculo;
use League\Plates\Engine;

require __DIR__ . "../../../vendor/autoload.php";

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "../../Views", "php");
    }

    public function ajaxMessage(string $message, string $type): string{
        return json_encode(["message" => "<div class=\"message {$type}\">{$message}</div>"]);
    }

    public function home($data)
    {
        $proprietarios = (new Proprietario())->find()->fetch(true);

        echo $this->view->render("home", [
            "title" => "Home | " . SITE,
            "proprietarios" => $proprietarios,
            "pagina" => "home",
            "notificacao" => $data ? true : false
        ]);
    }

    public function cadastro($data)
    {
        echo $this->view->render("cadastro", [
            "title" => "Cadastro | " . SITE,
            "pagina" => "cadastro",
            "cadastro_invalido" => $data
        ]);
    }

    /**
     * 
     */
    public function novoCadastro($data)
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
                
                $_SESSION['cadastro_realizado'] = true;
                header("location: ".url(''));
            } else {
                $proprietario->destroy();
                $this->cadastro($data = [
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
            $this->cadastro($data = [
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

    public function editar($data)
    {
        echo $this->view->render("editar_proprietario", [
            "title" => "Editar Proprietário | " . SITE,
            "pagina" => "lista"
        ]);
    }

    public function lista($data)
    {
        $proprietarios = (new Proprietario())->find()->fetch(true);

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
        $proprietario = (new Proprietario())->findById($data['proprietario']);

        $veiculos = $proprietario->veiculos();


        echo $this->view->render("proprietario", [
            "title" => "Informações do Proprietário | " . SITE,
            "proprietario" => $proprietario,
            "veiculos" => $veiculos,
            "pagina" => "lista"
        ]);
    }

    public function listaVeiculos($data)
    {
        $veiculos = (new Veiculo())->find()->fetch(true);

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
