<?php
	include("voltar.php");
	
	global $pdo;
	$pubs=$pdo->prepare("SELECT * FROM publicacoes ORDER BY ID DESC");
	$pubs->execute();

	while ($pub = $pubs->fetch(PDO::FETCH_ASSOC)) {
		$nome = $pub['nome'];
		$texto = $pub['texto'];
		$data = $pub['data'];
		$dataexp = $pub['dataexp'];
		$id = $pub['ID'];

		$dia = date("d");
		$mes = date("m");
		$ano = date("Y");
		$hora = date("H");
		$minuto = date("i");
		$seg = date("s");
		$hoje = ($ano."-".$mes."-".$dia." ".$hora.":".$minuto.":".$seg);

		$diaexp = date("d", strtotime($dataexp));
		$mesexp = date("m", strtotime($dataexp));
		$anoexp = date("Y", strtotime($dataexp));
		$horaexp = date("H", strtotime($dataexp));
		$minutoexp = date("i", strtotime($dataexp));
		$segexp = date("s", strtotime($dataexp));

		echo '<div class="col-xs-6 col-lg-4">
					<h2>'.$nome.'</h2><h5>Postado em '.date("d/m", strtotime($data)).' às '.date("H:i", strtotime($data)).'</h5>
					<blockquote><p>'.$texto.'</p></blockquote>
				</div>
';

		if($anoexp - $ano <= 0){
			if($mesexp - $mes <= 0){
				if ($minutoexp - $minuto <= 0) {
					if($horaexp - $hora <= 0){
						if ($diaexp - $dia <= 0) {
							$query = $pdo->prepare("DELETE FROM publicacoes WHERE ID = '$id'");
							$query->execute();
						}
					}
				}
				if($mesexp - $mes < 0){
					$query = $pdo->prepare("DELETE FROM publicacoes WHERE ID = '$id'");
					$query->execute();
				}
			}
			if($anoexp - $ano < 0){
				$query = $pdo->prepare("DELETE FROM publicacoes WHERE ID = '$id'");
				$query->execute();
			}
		}
	}
?>