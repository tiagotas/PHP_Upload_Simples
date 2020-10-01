<?php

try {

    // Definindo direitório de destino.
    $diretorio_destino = "enviados/";

    // Verificando se diretorio de destino existe.
    if(!is_dir($diretorio_destino)) 
        throw new Exception("Diretório não encontrado.");

    // Verifca se o arquivo é executavel.
    if(is_executable($_FILES["arquivo_up"]["tmp_name"])) 
        throw new Exception("Arquivos Executáveis não são permitidos.");   

    // Obtendo a extensão do arquivo.    
    $ext_arquivo = pathinfo($_FILES["arquivo_up"]["name"], PATHINFO_EXTENSION);    

    // enviado_as7d6asd67asd6as.gif
    $nome_unico = uniqid("enviado_") . "." . $ext_arquivo;

    // Caminho do novo arquivo no servidor.    
    $nome_arquivo_servidor = $diretorio_destino . $nome_unico;

    // Movendo o arquivo temporario para o diretorio final.
    if(move_uploaded_file($_FILES["arquivo_up"]["tmp_name"], $nome_arquivo_servidor))
    {
        echo "Arquivo Enviado!";

    } else throw new Exception("Erro ao enviar. Erro: " . $_FILES["arquivo_up"]["error"]);      
     
} catch(Exception $e) {

    echo $e->getMessage();
}







