<?php
	//connessione al database e recupero i dati della session
	include 'connessione.php';
	include 'salvaSessione.php';
	//Recupero dal form l'utente e dalla session l'id del blog
	$utente = $_POST['Utente'];
	$blog = $_SESSION['idBlog'];
	//Revoco la collaborazione/seguace
	$queryColl = "DELETE FROM Collaboratore WHERE Utente = '$utente' AND Blog = '$blog'";
	$exColl = mysqli_query($connessione,$queryColl);
	if (!$exColl) {
        printf("Error: %s\n", mysqli_error($connessione));
        exit();
    }
    //Chiudo la connessione
    mysqli_close($connessione);
?>
