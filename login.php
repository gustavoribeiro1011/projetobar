<?php 

include ('config.php');

session_start();

$titulo_pagina = 'Login'; 


if (isset($_POST['entrar'])) {

$email ='';
$entrar= '';
$senha ='';

$email = $_POST['email'];

$senha = md5($_POST['senha']);


  $verifica = mysqli_query($conecta, "SELECT * FROM usuarios WHERE email = 
    '$email' AND senha = '$senha' ") or die("erro ao selecionar");

  $row = mysqli_fetch_assoc($verifica);

  if (mysqli_num_rows($verifica)<=0){
    echo"<script language='javascript' type='text/javascript'>
    alert('Login e/ou senha incorretos');window.location
    .href='login.php';</script>";
    die();
  }else{
    $_SESSION['id'.$app_token] = $row['id'];
    $_SESSION['email'.$app_token] = $email;
    $_SESSION['login'.$app_token] =$row['login'];
    $_SESSION['login_nome'.$app_token] = $row['nome'];
    $_SESSION['sobrenome'.$app_token] = $row['sobrenome'];
    $_SESSION['nivel'.$app_token] = $row['nivel'];


//definindo fuso horario
                $usuario = $_SESSION['id'.$app_token];
                $verificaSeExisteFuso="SELECT * FROM configuracoes_sistema WHERE usuario='$usuario'";
                $conecta->query($verificaSeExisteFuso);
                $r=mysqli_fetch_assoc(mysqli_query($conecta,$verificaSeExisteFuso));

                header("Location: index.php");


                if ( $r['usuario'] ){

                $fuso_horario=$r['fuso_horario'];

                $_SESSION['fuso_horario'.$app_token] =  $fuso_horario;

           


                } else {

                  session_start();

                  $_SESSION['fuso_horario'.$app_token] =  'America/Sao_Paulo';

                  $_SESSION['msg_erro'.$app_token] = "Por favor, defina um fuso horário";

                  header("Location: views/config/fusoHorario.php");

                 



              }


    
  }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $titulo_pagina; ?> | <?php echo $app_name; ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Area restrita</h1>
                  </div>

                  <form class="user" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                      </div>
                    </div>

                     <button type="submit" id="entrar" name="entrar" class="btn btn-primary btn-user btn-block">Entrar</button>

                                   </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Esqueceu a senha?</a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
