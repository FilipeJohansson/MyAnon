<?php
	error_reporting(0);
	$connection = "mysql:host=localhost;dbname=myanon";

	try {
		$pdo = new PDO($connection, "root", "") or die();
	} catch (PDOException $e) {
		if($e->getCode() == 2002){
			echo "<div class='text-center'><span class='glyphicon glyphicon-exclamation-sign'>Não foi possível conectar ao servidor!</span></div>";
		}else if($e->getCode() == 1049){
			echo "<div class='text-center'><span class='glyphicon glyphicon-exclamation-sign'>Não foi possível conectar ao banco de dados.</span></div>";
		}else if($e->getCode() == 1045){
			echo "<div class='text-center'><span class='glyphicon glyphicon-exclamation-sign'>Não foi possivel fazer a conexão!</span></div>";
		}else{
			echo $e->getMessage();
		}
	}
?>
