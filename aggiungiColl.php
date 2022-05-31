<?php
//Includo la pagina che mi connette al  database e lsa pagina che mi salva la sessione
include 'connessione.php';
include 'salvasessione.php';
//Recupero l'utente che ho inserito nel form html
$utente = $_POST['Utente'];
//Recupero dalla sessione l'id del blog e l'utente attualmente loggato
$blog = $_SESSION['ID_Blog'];
$utenteLog = $_SESSION['Email'];
//Se aggiungessi l'utente che ha creato il blog mi rende impossibile l'operazione
if($utente == $utenteLog){
//Chiusura della connessione ed uscita
mysqli_close($connessione);
exit();
//Altrimenti esegue prima una select per vedere se l'utente che richiedo è già seguace
}else{
$queryContr = "SELECT Utente FROM Seguace WHERE Utente = '$utente'";
$exContr = mysqli_query($connessione,$queryContr);
$contaCr = mysqli_num_rows($exContr);
//Se l'utente che ho scelto non è seguace allora lo aggiungo come collaboratore
if($contaCr>0){
//Lo rimuovo dai seguaci
$queryD = "DELETE FROM Seguace WHERE Utente = '$utente'";
$exD = mysqli_query($connessione,$queryD);
}
$queryColl = "INSERT INTO Collaboratore (Utente,Blog) VALUES('$utente','$blog')";
$exColl = mysqli_query($connessione,$queryColl);
//Chiudo la connessione
mysqli_close($connessione);
}

?>

