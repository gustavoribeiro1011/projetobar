<?php
if (!isset($_SESSION['login'.$app_token])){
  echo "nao tem sessao iniciada!";
  header('Location: login.php');
}else{
null;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo ucfirst($app_page_name) ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo BASEURL; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo BASEURL; ?>css/sb-admin-2.css" rel="stylesheet">
  
  <script src="<?php echo BASEURL;?>vendor/jquery/jquery.min.js"></script>

  <link href="<?php echo BASEURL;?>vendor/alertify/css/alertify.min.css" rel="stylesheet">


</head>

  <!-- Controller Sidebar Toggle -->
  <?php include_once($ControllerSidebarToggle); ?>