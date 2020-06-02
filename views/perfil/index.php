<?php 

session_start();


$app_item="perfil";
$app_page_name="Perfil";


include ('../../config.php');

include('../../inc/header.php');


 ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php





            $nome = "";
            $sobrenome = "";
            $email = "";


            if ( isset ($_POST['salvar']) ){




              $nome = $_POST['inputNome'];
              $sobrenome = $_POST['inputSobrenome'];
              $email = $_POST['inputEmail'];


              if ( 
                !empty ( $nome ) && 
                !empty ( $sobrenome )  &&
                !empty ( $email ) 
              ){

                //alterar os dados
                $updateDados="
                UPDATE usuarios 
                SET nome = '".$nome."',
                 sobrenome = '".$sobrenome."',
                 email = '".$email."'
                WHERE login = '".$_SESSION['login'.$app_token]."'
                ";

                  if ($conecta->query($updateDados) === TRUE) {

                   $_SESSION['msg_sucesso'.$app_token] = "Dados atualizados com sucesso";


      

                  } else {

                  $_SESSION['msg_erro'.$app_token] = "Falha ao atualizar os dados ".$conecta->error;
                  
                  }       




              //verificar se a senha nova é igual a senha confirmada

              } else {
                $_SESSION['msg_erro'.$app_token] = "Favor preencha todos os campos";
              }



            } else {

            }
?>



    <!-- Sidebar -->
    <?php include('../../inc/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <!-- Topbar -->
       <?php include('../../inc/topbar.php'); ?>


       <!-- Begin Page Content -->
       <div class="container-fluid">

   

        <!-- Content Row -->
        <div class="row">




  

<!-- Content Row -->


  <!-- Area Chart -->
  <div class="col-xl-12 col-lg-6">
    <div class="card shadow mb-12">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Perfil</h6>

      </div>
      <!-- Card Body -->
      <div class="card-body">


<?php


$sql="SELECT login,nome,sobrenome,senha,email FROM usuarios WHERE login = '".$_SESSION['login'.$app_token]."'";
$conecta->query($sql);
$r=mysqli_fetch_assoc(mysqli_query($conecta,$sql));

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >

    <div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" class="form-control" name="inputNome" value="<?=$r['nome'];?>" required>    
  </div>
      <div class="form-group">
    <label for="inputSobrenome">Sobrenome</label>
    <input type="text" class="form-control" name="inputSobrenome" value="<?=$r['sobrenome'];?>" required>    
  </div>
  <div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" name="inputEmail" value="<?=$r['email'];?>" required>    
  </div>
  <div class="form-group">
    <a href="alterarSenha.php"><i class="fas fa-key"></i> Alterar senha</a> 
  </div>
  <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
</form>


      </div>
    </div>
  </div>

  


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include('../../inc/footer.php'); ?>


          <?php if ( !empty ( $_SESSION['msg_sucesso'.$app_token] )  ) { ?>

                <script language="javascript" type="text/javascript">
              function f_mostra_msg_sucesso() {
                
                alertify.success('<font color="white"><?php echo $_SESSION['msg_sucesso'.$app_token]; ?></font>');

              }
              f_mostra_msg_sucesso();
            </script>

          <?php }
          $_SESSION['msg_sucesso'.$app_token] = "";
           ?>


          <?php if ( !empty ( $_SESSION['msg_erro'.$app_token] )  ) { ?>

                <script language="javascript" type="text/javascript">
              function f_mostra_msg_erro() {
                
                alertify.error('<font color="white"><?php echo $_SESSION['msg_erro'.$app_token]; ?></font>');

              }
              f_mostra_msg_erro();
            </script>

          <?php }
          $_SESSION['msg_erro'.$app_token] = "";
           ?>



