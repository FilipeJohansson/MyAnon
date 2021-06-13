<?php
	$data = date("d/m H:i");

	$data2 = ("28/09 22:24");

	#echo $data ." | ". $data2;

	#echo $data - $data2;

	$dia = date("Y-m-d H:i:s");

	$dia2 = ("2016-09-28 23:35:50");

	echo $dia . " | " . $dia2;

	if($dia >= $dia2){
		echo "eao";
	}
?>