<?php

// function dd($params = [], $die = true){
//     echo '<pre>';
//     print_r($params);
//     echo '</pre>';

//     if($die) die();
// }

function dd($data){
    highlight_string("<?php\n " . var_export($data, true) . "?>");
    echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
    //die();
}

/**
 * Verifica se o código de erro tem uma mensagem atribuida.
 */
function checaErro($error, $message){
    foreach($message as $item){
        if($item == $error)
            return true;
    }
    return false;
}

function geraQrCode(){
    
}