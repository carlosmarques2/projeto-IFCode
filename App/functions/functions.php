<?php

use App\Models\Proprietario;
use App\Util\Util;

function dd($data){
    highlight_string("<?php\n " . var_export($data, true) . "?>");
    echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
    //die();
}

/**
 * Verifica se o código de erro tem uma mensagem atribuida.
 */
function verificaErro($error, $message){
    foreach($message as $item){
        if($item == $error)
            return true;
    }
    return false;
}

function verificaInclude(){
    echo "Funcionou";
}


function geraQrCode(string $id, string $nome_img_qr){
    (new Util())->getQrCode()->generate(URL_QRCODE.'/'.$id, DIR_QRCODES."\\".$nome_img_qr.'.png');
}

function verificaQrCodes3(Array $proprietarios){
    $cont = 0;
    foreach($proprietarios as $proprietario){
        if(file_exists(DIR_QRCODES.'\qrcode-'.$proprietario->id.'.png'))
            $cont +=1;
    }
    return $cont;
}