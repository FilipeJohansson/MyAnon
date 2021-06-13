<?php
	function nomes(){
		$nomes = array("Beatriz","Sofia","Maria","Camila","Amanda","Bruna","Laura","Júlia","Ana","Lara","Isabela","Larissa","Carolina","Valentina","Yasmim","Letícia","Luana","Mariana","Guilherme","Gustavo","Lucas","João","Enzo","Gabriel","Vinícius","Rodrigo","Henrique","Bruno","Eduardo","Miguel","Leonardo","Diego","Pedro","Vitor","Rafael","Matheus","Filipe","Caio","Galdino","Joyce","Vanderleia","Dinah","Adriana","Everton","Yudi","Carlos","Frances","Adriele","Walter","Wilmar","Karla","Fani","Fanny","Wanderson","Natan");

		$sobrenomes = array("Muniz","Schumacher","Mazzaropi","Monteiro","Müller","Marques","Moraes","Duarte","Vasconcelos","Montenegro","Fagundes","Trindade","Vargas","Ferraz","Carvalho","Dolabella","Evelyn","Reymond","Lins","Andrade","Boaventura","Barcellos","Dantas","Oliveira","Carvalho","Vilela","Santana","Ribeiro","Barros","Moscovis","Gonçalves","Johnson","Castro","Assunção","Kannenberg","Torres","Gomes","Alves","Steves","Garcia","Moura","Albuquerque","Antunes","Barcelos","Roriz","Ferrari","Castiel","Fischer","Novaes","Gimenez","Schoemberger","Falabella","Martins","Drummond","Figueiredo","Resende","Sampaio","Fernandes","Cavalcante","Arantes","Lombardi","Dieckmann","Góes","Menezes","Ganzarolli","Guimarães","Liberato","Alencar","Marinho","Lambertini","Lafaiete","Sanches","Timberg","Bernardi","Werneck","Schmütz","Annenberg","Campos","Medeiros","Lessa","Hickmann","Fontenelle","Bittencourt","Noronha","Abravanel","Sheherazade","Bastos","Meneghel","Bonner","Riche","Chapelin","Rios","Giácomo","D’Ávila","Close","Bial","Maldonado","Bongiovanni","Vitti","Silverstone","Close Certo","Close Errado");

		$nome = rand(0, count($nomes));
		$sobrenome = rand(0, count($sobrenomes));

		return $nomes[$nome]." ".$sobrenomes[$sobrenome];
	}
?>