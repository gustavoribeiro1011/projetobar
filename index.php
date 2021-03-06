<?php 

session_start();


$app_item="dashboard";
$app_page_name="dashboard";


include ('config.php');

include('inc/header.php'); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('inc/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <!-- Topbar -->
       <?php include('inc/topbar.php'); ?>


       <!-- Begin Page Content -->
       <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Pedidos em aberto (Geral) Card Example -->
          <?php

          $sqlPedidosEmAberto = "
          SELECT 
          sum((
          SELECT SUM(preco)
          FROM pedidos
          WHERE STATUS LIKE '%item cadastrado%'
          AND num_pedido = a.num_pedido
          )) soma
          FROM pedidos a
          WHERE a.status = 'em produção'
          ";
          $conecta->query($sqlPedidosEmAberto);
          $row_PedidosEmAberto=mysqli_fetch_assoc(mysqli_query($conecta,$sqlPedidosEmAberto));
          ?>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pedidos em aberto (Geral)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">R$<?=number_format($row_PedidosEmAberto['soma'], 2, ',', '.');?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks </div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                      </div>
                      <div class="col">
                        <div class="progress progress-sm mr-2">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->

        <div class="row">

          <!-- Area Chart -->
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Sobre o projeto bar</h6>
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

                <ul><b>Bugs</b>

                  <li><strike>No servidor externo o horário dos pedidos está sendo  gravado com diferença de 1 hora.</strike>  <i class="fas fa-check"></i>  15/06/2020</li>

                  <li><strike>Corrigir o voltar do "Resumo Pedido"</strike> <i class="fas fa-check"></i> 16/06/2020</li>

                  <li>Corrigir o remover mesas, o sistema está deixando excluir todas as mesas sem verificar se a mesa está disponivel ou nao.</li> 

                  <li>Quando o garçom clica em um numero de mesa acidentalmente e depois clica em voltar, a mesa ainda continua aparecendo que esta em atendimento, o certo era voltar a mesa para disponível.</li>

                  <li>Retomar pedido está com erro</li>

                  <li>se dois garçom clicar ao mesmo tempo na mesma mesa o sistema deixa fazer pedido </li>

                  <li>em alguns momentos quando fico clicando muito nas mesas aparece a mensagem de erro Data Tables warning: table id=dataTable - cannot reinitialise DataTable provavelmente esta incluindo dois script instanciando datable com o mesmo id</li>

                </ul>

                <ul><b>Melhorias</b>

                  <li><strike>O modal que fica perguntando que existe pedido em aberto incomoda demais, tirar essa opção!!</strike> <i class="fas fa-check"></i> 16/06/2020</li>

                  <li>Implementar a opção de observação do pedido. O cliente pode fazer uma observação Ex.: x-salalda sem ervilha, hamburger ao ponto.</li>

                  <li>Implementar a opção de cadastrar mais de 1 usuário no sistema. Ex. admin, garçom, caixa, cozinha, gerente etc.</li>

                  <li>Na hora de fazer o pedido deveria ter a opção de selecionar a quantidade  dos itens, as vezes o cliente pede por exemplo 2 lanches e 3 sucos.</li>

                  <li>Na versão pra celular sempre deixar o menu lateral ocultado, pois assim aproveita todo o espaço da tela, aí quando a pessoa quiser ver o menu só cliclar no icone para expandir.</li>

                  <li>No cardMesa para celular está exibindo duas mesas por linha, acho que fica melhor umas 4 mesas por linha para aproveitar bem a tela do celular</li>

                  <li>seria legal aparecer algum icone no num. da mesa informando se tem algum pedido pra chegar ou se foi entregue todos os pedidos tipo Mesa 01 1 pedido pendendente..Mesa 02 Todos entregue!</li>

                  <li>Dar um nome legal para o sistema.</li>

                </ul>


                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Pie Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
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
                <div class="chart-pie pt-4 pb-2">
                  <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Direct
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Social
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Referral
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Content Column -->
          <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
              </div>
              <div class="card-body">
                <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>

            <!-- Color System -->
            <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                  <div class="card-body">
                    Primary
                    <div class="text-white-50 small">#4e73df</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                  <div class="card-body">
                    Success
                    <div class="text-white-50 small">#1cc88a</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                  <div class="card-body">
                    Info
                    <div class="text-white-50 small">#36b9cc</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                  <div class="card-body">
                    Warning
                    <div class="text-white-50 small">#f6c23e</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                  <div class="card-body">
                    Danger
                    <div class="text-white-50 small">#e74a3b</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                  <div class="card-body">
                    Secondary
                    <div class="text-white-50 small">#858796</div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
              </div>
              <div class="card-body">
                <div class="text-center">
                  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                </div>
                <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
              </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
              </div>
              <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
              </div>
            </div>

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php include('inc/footer.php'); ?>

