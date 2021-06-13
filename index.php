<?php
	include("conexao.php");
	include("nomes.php");
	echo "<br>";

	echo "<div class='text-center'><h1><span class='glyphicon glyphicon-sunglasses'>MyAnon</span></h1></div>
	<h6 class='text-center'>Version 1.3</h6>";
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="MyAnon">
		<meta name="keywords" content="MyAnon, anonymous, anonimato, publicar, escrever" />
		<meta name="author" content="Filipe Johansson">
		<link rel="icon" href="./imagens/logo.png">

		<title>MyAnon</title>

		 <!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h2>Conte para todos, aquilo que você tem preso dentro de você sem que o mundo saiba quem você é.</h2>
				<p>Fale tudo que você sempre quis falar mas estava com medo das pessoas saberem.</p>
				<h5>
					<span class="glyphicon glyphicon-time"></span> As postagens são removidas após 24 horas.
				</h5>
				<h5>
					<span class="glyphicon glyphicon-eye-close"></span> Nada sobre você é gravado.
				</h5>
				<h5>
					<span class="glyphicon glyphicon-random"></span> Os nomes são gerados aleatoriamente.
				</h5>
			</div>
		</div>
		<!-- Caixa de publicação -->
		<div class="container">
			<div class="form-group">
				<div class="panel panel-default">
					<?php
						if (isset($_POST['publicar'])) {
							$texto = $_POST['texto'];
							$nome = nomes();

							$dia = date("d");
							$mes = date("m");
							$ano = date("Y");
							$hora = date("H");
							$minuto = date("i");
							$seg = date("s");
							$data = ($ano."-".$mes."-".$dia." ".$hora.":".$minuto.":".$seg);

							$mesexp = $mes;
							$minutoexp = $minuto + 1;

							if($dia == '30'){
								if($mes == '09'){
									$diaexp = '01';
									$mesexp = '10';
								}
								$diaexp = $dia + 1;
							}

							if($dia == '31' && $mes != '09'){
								$diaexp = '01';
								$mesexp = $mes + 1;
							}
							
							$dataexp = ($ano."-".$mesexp."-".$diaexp." ".$hora.":".$minutoexp.":".$seg);

							if ($texto == "") {
								echo "<h3 class='text-center'>Você precisa escrever algo para poder publicar.</h3><br>";
							}else{
								#include("bot.php");

								#$bot = bot($texto);

								$query = $pdo->prepare("INSERT INTO publicacoes (nome,texto,data,dataexp) VALUES ('$nome','$texto','$data','$dataexp')");

								#if($bot == "sim"){
									$accept = $query->execute();

									if ($accept) {
										header("Location: ./");
									}else{
										echo "<h3 class='text-center'>Erro ao publicar.</h3><br>";
									}
								#}else{
									#echo "<h3 class='text-center'>Postagens fora das regras.</h3><br>";
								#}
							}
						}
					?>
					<div class="panel-body">
						<form method="POST" enctype="multipart/form-data">
							<textarea class="form-control" style="margin-top: 0px; margin-bottom: 0px; width: 100%; resize: none;" rows="11" name="texto" placeholder="Escreva oque você deseja revelar para o mundo."></textarea>
							<br>
							<input class="btn btn-lg btn-block btn-default" type="submit" name="publicar" value="Publicar"/>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12">
			<hr>
			<!-- Postagens -->
			<div class="row">
				<?php
					include("publicacoes.php");
				?>
			</div>
		</div>
	</body>
</html>