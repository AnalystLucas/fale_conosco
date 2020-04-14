<?php 

//Back-end
//By: Lucas Moreira
//Trabalho gratuito, voluntario.
//contato: negocios.lmsolution@outlook.com

require_once "php/processar.php";

$processa = new Processar();

$msg = ""; //msg vai receber a mensagem de retorno do processa, e vai passar para a div que monta o alert personalizado, para informar 
//o usuário o que esta acontecendo.

$dados = []; //recebe o array post, para quando fisher o refresh e der erro preencher os input's para nao precisar preencher tudo de novo.
//pode ser feito com ajax e ficar melhor essa parte.

$bgcolor = ""; //Vai receber a classe que esta com a cor do fundo para cada mensagem.

if(isset($_POST) && !empty($_POST)){ //verifica se foi feito post para a pagina e se ele não esta vazio.

$dados = $_POST;

$processa->insert($_POST, $_FILES);

$msg = $processa->retorno();

if($msg["retorno"] == true){ //verificando se o retorno volto true/false, para montar a mensagem do alert, e colocar o fundo conforme o retorno.
  $bgcolor = "bg-success";
}else{
  $bgcolor = "bg-error";
}

}

?>

<!DOCTYPE html>
<html lang="pt-br" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Nfulu Muanda</title>
    
<link rel="shortcut icon" type="image/x-icon" href="imag/favorito.png">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- FONT AWESOME -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- CSS  -->
 
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/custom1.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" href="css/notificacao.css">
</head>

<body>
  <?php if( !empty($msg) ){ ?>
    <div id="Notificacao" class="t-center <?php echo $bgcolor ?> l-div z-depth-2"> 
      <p>
      <?php 
        echo $msg["message"];
      ?>
      </p>
      <div id="btn" class="btn-p">
        <button type="button" id="btn-fechar" class="btn-display <?php echo $bgcolor ?>">X</button>
      </div>
    </div>
  <?php } ?>

  <nav class="blue lighten-3 " role="navigation">
    <div class="nav-wrapper container">
      <a href="index.html" class="brand-logo"><img src="imag/favorito.png"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.html">Inicio</a></li>
          <li><a href="#">Actividades</a></li>
          <li><a href="doacao.html">Doações</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="#">Sobre Nos</a></li>
         
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="index.html">Inicio</a></li>
          <a>Actividades</a>
          <li><a href="#">Futuras</a></li>
          <li><a href="#">Passadas</a></li>
         <a>Doação</a>
          <li><a href="#">Pedido de Ajudas</a></li>
          <li><a href="#">Ajudados</a></li>
          <a>-----------------------</a>
           <li><a href="#">Galeria</a></li>
           <li><a href="#">contacto</a></li>
           <li><a href="#">Sobre Nos</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
        
<!--contacto-->
<div class="row conttainer">
    <section>
        
        
        
        <div class="col s12 m6 l4">
                <div class="informacoes ">
                    <h4> Redes sociais </h4>
                    <p class="light"> Fique por dentro das novidades, receba dicas, ou simplesmente mostre ao mundo que você faz parte desse projeto sensacional! </p>
                    <a href="#" class="btn-floating brown -logo"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="btn-floating brown -logo"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="btn-floating brown -logo"><i class="fa fa-twitter"></i></a>

                    <h4> Endereço </h4>
                    <p class="light"> Cazenga-Petrangol <br>
                    socolas,1 rua da frescura</p>

                    <h4> Contatos </h4>
                    <p class="light">
                        (244) 123456987 <br>
                        (244) 123456789 <br>
                        (244) 234567678 
                    </p>

                </div>
           </div>
     <div class="col s12 m6 l4">
                <div class="formulario white black-text">
                    <h4> Fale conosco </h4>
                    <p class="light">  Dúvidas, criticas ou sujestões? Entre em contato conosco, seu feedback é muito importante. </p>
                    <!-- action="contactos.php" -->
                    <form name="frmcontato" action="#" method="post" onsubmit="return validarForm()" enctype="multipart/form-data">

                       <div class="input-field">
                            <input type="text" name="nome_completo" id="nome_completo" value="<?php 
                              if($msg["retorno"] == false){ 
                              echo $_POST['nome_completo'];
                              }
                            ?>">
                            <label for="nome_completo">Nome Completo</label>
                        </div>

                        <div class="input-field">
                            <input type="text" name="sobrenome" id="sobrenome" value="<?php 
                              if($msg["retorno"] == false){ 
                              echo $_POST['sobrenome'];
                              }
                            ?>">
                            <label for="sobrenome">Sobrenome</label>
                        </div>
                        
                        <div class="input-field">
                            <input type="email" name="email" id="email" value="<?php 
                              if($msg["retorno"] == false){ 
                              echo $_POST['email'];
                              }
                            ?>">
                            <label for="email">Seu email</label>
                        </div>
                        
                        <div class="input-field">
                            <input type="text" name="contacto" id="contacto" value="<?php 
                              if($msg["retorno"] == false){ 
                              echo $_POST['contacto'];
                              }
                            ?>">
                            <label for="contacto">Seu contacto</label>
                        </div>
                        
                        <label>Provincia</label>
  <select class="browser-default" name="provincia">
    <option value="s/i" disabled selected>Escolhe a sua Provincia</option>
    <option value="Cabinda">Cabinda</option>
    <option value="Zaire">Zaire</option>
    <option value="Uíge">Uíge</option>
      <option value="Luanda">Luanda</option>
      <option value="Bengo">Bengo</option>
      <option value="Cuanza Norte">Cuanza Norte</option>
      <option value="Malanje">Malanje</option>
      <option value="Lunda Norte">Lunda Norte</option>
      <option value="Cuanza Sul">Cuanza Sul</option>
      <option value="Lunda Sul">Lunda Sul</option>
      <option value="Benguela">Benguela</option>
      <option value="Huambo">Huambo</option>
      <option value="Bié">Bié</option>
      <option value="Moxico">Moxico</option>
      <option value="Namibe">Namibe</option>
      <option value="Huíla">Huíla</option>
      <option value="Cunene">Cunene</option>
      <option value="Cuando Cubango">Cuando Cubango</option>
  </select>

                        <div class="input-field">
                            <input type="text" name="localidade" id="localidade" value="<?php 
                              if($msg["retorno"] == false){ 
                              echo $_POST['localidade'];
                              }
                            ?>">
                            <label for="localidade">Localidade</label>
                        </div>

                        <div class="input-field">
                            <textarea id="historia" name="historia" class="materialize-textarea"><?php 
                                if($msg["retorno"] == false){ 
                                echo $_POST['historia'];
                                }
                              ?>
                            </textarea>
                            <label for="historia">Sua Historia</label>
                        </div>
<label>È importante sua foto</label>
               <div class = "file-field input-field">
                  <div class = "btn brown ">
                     <span>Sua foto</span>
                     <input type = "file" name="imagem" />
                  </div>
                  
                  <div class = "file-path-wrapper">
                     <input class = "file-path validate" type = "text"
                        placeholder = "carrega sua foto" />
                  </div>
               </div>
            </div>
                        <button class="btn brown -logo" type="submit"> Enviar </button>
                        

                    </form>
                    
                </div>
    </section>
    </div>
        
    
    
    
    
    
    
     
        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 <footer class="page-footer blue lighten-3">
     
          <div class="container">
            <div class="row">
                
              <div class="col l4 s12">
                <h5 class="white-text">Siga-nos nas redes socias</h5>
                <p class="grey-text text-lighten-4">Fique por dentro das novidades e actividades interaje com a comunidade ou mostre ao mundo que voçe faz parte   </p>
                  <a href="#" class="btn-floating brown -logo"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="btn-floating brown -logo"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="btn-floating brown -logo"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="btn-floating brown -logo"><i class="fa fa-whatsapp"></i></a>
              </div>
                
              <div class="col l4 s12">
                <h5 class="white-text">Contactos</h5>
                <div class="col-xl-6 col-md-6 col-lg-4">
                <p>+(244)934 803 387 <br>
                                    info@gmail.com <br>
                                    Distritu urbano do Cazenga
                                    Petrangol-Socolas
                                </p>
               </div>
              </div>
                
                <div class="col l3 s12">
          <h5 class="white-text">Menu</h5>
          <ul>
            <li><a class="white-text" href="index.html">Inicio</a></li>
            <li><a class="white-text" href="#">Actividades</a></li>
            <li><a class="white-text" href="#!">Galeria</a></li>
            <li><a class="white-text" href="doacao.html">Doação</a></li>
          </ul>
        </div>
        
                
                
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2020-Todos os direitos resercados 
            <a class="grey-text text-lighten-4 right" href="#!">Nfulu Muana</a>
            </div>
          </div>
        </footer>




  





  <!--  Scripts-->
  <script src="php/javascript/validacao.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
      height:500,
    $('.slider').slider({
          height: 500
      });
      
  });
    
    $(document).ready(function(){
    $('select').formSelect();
  });

  //Remove a messagem de alerta personalizada não mexer caso não tenha entendimento !
  $(document).ready(function(){
    $("#btn-fechar").click(function(){
      var div = $("#Notificacao");
      
      if(div.hasClass("d-hidden")){
        div.removeClass("d-hidden");
      }else{
        div.addClass("d-hidden");
      }

    })
  });
  </script>
</body>
</html>
