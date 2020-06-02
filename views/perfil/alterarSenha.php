<?php 

session_start();




$app_item="perfil";
$app_page_name="Perfil";


include ('../../config.php');

include('../../inc/header.php'); ?>



<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

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



						<?php

						$_SESSION['msg_sucesso'.$app_token] = "";
						$_SESSION['msg_erro'.$app_token] = "";
						
						$senha_atual = "";
						$senha_nova = "";
						$confirmar_senha_nova = "";


						if ( isset ($_POST['salvar']) ){


							$senha_atual = $_POST['inputSenhaAtual'];
							$senha_nova = $_POST['inputSenhaNova'];
							$confirmar_senha_nova = $_POST['inputConfirmarSenhaNova'];


							if ( 
								!empty ( $senha_atual ) && 
								!empty ( $senha_nova )  &&
								!empty ( $confirmar_senha_nova ) 
							){

				 			//verificar se a senha atual digitada pelo usuario bate com a senha atual do banco de dados
								$sql="SELECT login,nome,sobrenome,senha,email FROM usuarios WHERE login = '".$_SESSION['login'.$app_token]."'";
								$conecta->query($sql);
								$r=mysqli_fetch_assoc(mysqli_query($conecta,$sql));


								if ( md5($senha_atual) == $r['senha'] ){

									if ( $senha_nova == $confirmar_senha_nova ){


									$updateSenha="update usuarios set senha=md5('".$senha_nova."') where login = '".$_SESSION['login'.$app_token]."'";

									if ($conecta->query($updateSenha) === TRUE) {

								   $_SESSION['msg_sucesso'.$app_token] = "Senha alterada com sucesso";

									} else {

									$_SESSION['msg_erro'.$app_token] = "Falha ao alterar a senha: ".$conecta->error;
									
									}


									} else {
									$_SESSION['msg_erro'.$app_token] = "Senha nova diferente da confirmada";
									}

								} else {
									//definir a mensagem de erro
									$_SESSION['msg_erro'.$app_token] = "Senha atual não confere";
									
								}


				 			//verificar se a senha nova é igual a senha confirmada

							} else {
								echo "Favor preencher todos os campos";
							}



						} else {

						}
						?>


						<!-- Area Chart -->
						<div class="col-xl-12 col-lg-6">
							<div class="card shadow mb-12">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Alterar senha</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
											<div class="dropdown-header">Dropdown Header:</div>
											<a class="dropdown-item" href="#">Action</a>
											<a class="dropdown-item" href="#">Another action</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Something else here</a>
										</div>
									</div>
								</div>
								<!-- Card Body -->
								<div class="card-body">


									<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
										<div class="form-group">
											<label>Senha atual</label>
											<input type="password" class="form-control" name="inputSenhaAtual" required>	

										</div>
										<div class="form-group">
											<label>Senha nova</label>
											<input type="password" class="form-control" name="inputSenhaNova" required>    
										</div>
										<div class="form-group">
											<label">Confirmar senha nova</label>
											<input type="password" class="form-control" name="inputConfirmarSenhaNova" required>    
										</div>
										<button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
										<a href="index.php" class="btn btn-secondary">Voltar </a>
										
										
									</form>



									<div class="chart-area">
										<canvas id="myAreaChart"></canvas>
									</div>
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



