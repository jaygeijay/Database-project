<?php
	include 'connessione.php';
	include 'salvaSessione.php';
	if(isset($_POST)){
		//recupero l'id del blog
		$idBlog = $_POST['id'];
		$_SESSION['idBlog'] = $idBlog;
		//Query per recuperare il nome del blog
		$queryNom = "SELECT Nome_Blog FROM Blog WHERE idBlog = '$idBlog'";
		$exNome = mysqli_query($connessione,$queryNom);
		$arrNom = mysqli_fetch_array($exNome);
		$blog = $arrNom[0];
		//memorizzo in sessione il nome del blog
		$_SESSION['Blog'] = $blog;
	}
	//Chiudo la connessione
	mysqli_close($connessione);
?>