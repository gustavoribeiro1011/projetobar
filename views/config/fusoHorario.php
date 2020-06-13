<?php 

session_start();




$app_item="fuso horario";
$app_page_name="Fuso horario";


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

						$usuario = $_SESSION['id'.$app_token];
						$fuso_horario = "";						


						if ( isset ($_POST['salvar']) ){

							
							$fuso_horario = $_POST['inputFusoHorario'];
							


							if ( 
								!empty ( $fuso_horario ) 
							){


								$verificaSeExiste="SELECT usuario FROM configuracoes_sistema WHERE usuario='$usuario'";
								$conecta->query($verificaSeExiste);
								$r=mysqli_fetch_assoc(mysqli_query($conecta,$verificaSeExiste));


								if ( $r['usuario'] ){

									 $_SESSION['fuso_horario'.$app_token] =  $fuso_horario;

								    //se existe fuso horario cadastrado p/ o usuario logado substitui o fuso			
									$sql="UPDATE configuracoes_sistema SET fuso_horario='$fuso_horario' 
									WHERE usuario='$usuario'";

								    $conecta->query($sql);

								 




								} else {

 									$_SESSION['fuso_horario'.$app_token] =  $fuso_horario;

								    //se nao faz a primeira inclusao
									$sql="INSERT INTO configuracoes_sistema (usuario,fuso_horario) 
									VALUES ('$usuario','$fuso_horario')";
								    
								    $conecta->query($sql);

								      ;

							}


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
								<h6 class="m-0 font-weight-bold text-primary">Fuso horário</h6>
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

									<?php $timezones = array(
										'AC' => 'America/Rio_branco',   'AL' => 'America/Maceio',
										'AP' => 'America/Belem',        'AM' => 'America/Manaus',
										'BA' => 'America/Bahia',        'CE' => 'America/Fortaleza',
										'DF' => 'America/Sao_Paulo',    'ES' => 'America/Sao_Paulo',
										'GO' => 'America/Sao_Paulo',    'MA' => 'America/Fortaleza',
										'MT' => 'America/Cuiaba',       'MS' => 'America/Campo_Grande',
										'MG' => 'America/Sao_Paulo',    'PR' => 'America/Sao_Paulo',
										'PB' => 'America/Fortaleza',    'PA' => 'America/Belem',
										'PE' => 'America/Recife',       'PI' => 'America/Fortaleza',
										'RJ' => 'America/Sao_Paulo',    'RN' => 'America/Fortaleza',
										'RS' => 'America/Sao_Paulo',    'RO' => 'America/Porto_Velho',
										'RR' => 'America/Boa_Vista',    'SC' => 'America/Sao_Paulo',
										'SE' => 'America/Maceio',       'SP' => 'America/Sao_Paulo',
										'TO' => 'America/Araguaia',    
									);



									?>
									<div class="form-group">

									</div>

									<div class="form-group">

										

										<label>Escolha a região</label>


										<select id="inputFusoHorario" class="form-control" name="inputFusoHorario">
		
			<?php $verificaSeExiste="SELECT * FROM configuracoes_sistema WHERE usuario='$usuario'";
								$conecta->query($verificaSeExiste);
								$r=mysqli_fetch_assoc(mysqli_query($conecta,$verificaSeExiste));


								if ( $r['usuario'] ){
									echo "<option>".$r['fuso_horario'] ."</option>";
								}
							else {

							echo "<option>--Selecione uma região--</option>";
							
							}
							
											foreach($timezones as $key => $value):
											echo '<option value="'.$value.'" class="form-group">'.$key.' - '.$value.'</option>'; //close your tags!!
										endforeach;?>
									</select>	

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

			<?php include('../../inc/footer.php');  ?>


			<?php

		

			 if ( !empty ( $_SESSION['msg_sucesso'.$app_token] )  ) { ?>

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

						
						alertify.alert('', '<?php echo $_SESSION['msg_erro'.$app_token]; ?>');


					}
					f_mostra_msg_erro();
				</script>

			<?php }
			$_SESSION['msg_erro'.$app_token] = "";
			?>



