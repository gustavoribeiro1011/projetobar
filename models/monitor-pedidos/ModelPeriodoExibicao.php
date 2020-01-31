<?php
$sessionPeriodoExibicao = isset($_SESSION['periodoExibicao'.$app_token] ) ? 'S' : 'N'; 

    if($sessionPeriodoExibicao == 'S'){

      if ($_SESSION['periodoExibicao'.$app_token] == 'hoje'){

        $periodoExibicao = "AND cadastro BETWEEN '".date('Y-m-d 00:00:00')."' AND '".date('Y-m-d 23:59:59')."'";
        $_SESSION['periodoExibicaoSql'.$app_token] = $periodoExibicao;
      } 
      else if ($_SESSION['periodoExibicao'.$app_token] == 'ontem'){

        $d=date('d')-1;
        $periodoExibicao = "AND cadastro BETWEEN '".date('Y-m-'.$d.' 00:00:00')."' AND '".date('Y-m-'.$d.' 23:59:59')."'";
        $_SESSION['periodoExibicaoSql'.$app_token] = $periodoExibicao;

      } 
      else if ($_SESSION['periodoExibicao'.$app_token] == 'personalizado'){

       $d1=$_SESSION['periodoExibicaod1'.$app_token]." 00:00:00";
       $d2=$_SESSION['periodoExibicaod2'.$app_token]." 23:59:59";


       $periodoExibicao = "AND cadastro BETWEEN '".$d1."' AND '".$d2."'";
       $_SESSION['periodoExibicaoSql'.$app_token] = $periodoExibicao;

     } else if ($_SESSION['periodoExibicao'.$app_token] == 'semana'){

$sabado = 6; //sabado = 6º dia = fim da semana.
$dia_atual=date('w'); //pego o dia atual
$dias_que_faltam_para_o_sabado = $sabado - $dia_atual;

$inicio = strtotime("-$dia_atual days");
$fim = strtotime("+$dias_que_faltam_para_o_sabado days");

$d1 = date('Y-m-d-',$inicio)." 00:00:00"; //data inicial
$d2 = date('Y-m-d-',$fim)." 23:59:59"; //data final


$periodoExibicao = "AND cadastro BETWEEN '".$d1."' AND '".$d2."'";

$_SESSION['periodoExibicaoSql'.$app_token] = $periodoExibicao;


} else

{
 $periodoExibicao = "";
 $_SESSION['periodoExibicaoSql'.$app_token] = "";
}

} else {

 $periodoExibicao = "";
  $_SESSION['periodoExibicaoSql'.$app_token] = "";
}

