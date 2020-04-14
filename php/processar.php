<?php

require_once "conect.php";

class Processar {
    public $upload;
    public $retorno;
    public $caminho_foto;

    public function insert($dados = [], $arquivo = []){

        $conn = new Conect();

        $formatos = array("png", "jpeg", "jpg");
        $extensao = pathinfo($arquivo['imagem']['name'], PATHINFO_EXTENSION);

        if( in_array($extensao, $formatos) ){
            
            $nome = $dados['nome_completo'];
            $sobrenome = $dados['sobrenome'];
            $nome_completo = $nome." ".$sobrenome;
            $nome_completo = str_replace(" ", "_", $nome_completo);
            
            $pasta = "fotos_recebidas/";
            $nome_arquivo = $nome_completo."_".uniqid().".".$extensao;
            $temporario = $arquivo['imagem']['tmp_name'];
            $this->caminho_foto = $pasta.$nome_arquivo;

            if(move_uploaded_file($temporario, $this->caminho_foto)){
                $this->upload = true;
                $this->retorno = ["message"=>"Imagem salva !","retorno"=>true];
            }else{
                $this->upload = false;
                $this->retorno = ["message"=>"Não foi possivel salvar a imagem, por favor tentar denovo !","retorno"=>false];
            }
            
        }else{
            
            $this->retorno = ["message"=>"Formato não permitido, Aceitos: jpeg, jpg, png","retorno"=>false];
    
        }
        
        
        if($this->upload == true){

            $nome = mysqli_real_escape_string($conn->conect(), $dados['nome_completo']);
            $sobrenome = mysqli_real_escape_string($conn->conect(), $dados['sobrenome']);
            $email = mysqli_real_escape_string($conn->conect(), $dados['email']);
            $contacto = mysqli_real_escape_string($conn->conect(), $dados['contacto']);
            
            $provincia = mysqli_real_escape_string($conn->conect(), $dados['provincia']);
            $localidade = mysqli_real_escape_string($conn->conect(), $dados['localidade']);
            $historia = mysqli_real_escape_string($conn->conect(), $dados['historia']);
            $arquivo_imagem = $this->caminho_foto;

            $insert = "INSERT INTO `contato` (`id_contato`, `nome_completo`, `sobrenome`, `email`, `contato`, `provincia`, `localidade`, `historia`, `caminho_foto`) 
            VALUES (NULL,'$nome', '$sobrenome', '$email', '$contacto', '$provincia', '$localidade', '$historia', '$arquivo_imagem')";

            $result = mysqli_query($conn->conect(), $insert);
            
            if($result == true){
               $this->retorno = ["message"=>"Contato enviado e historia salva !","retorno"=>true];
            }else{
                $this->retorno = ["message"=>"Erro: Não foi possivel salvar os Dados !","retorno"=>false];
            }

            mysqli_close($conn->conect());
        }
    }

    public function retorno(){
        return $this->retorno;
    }
}