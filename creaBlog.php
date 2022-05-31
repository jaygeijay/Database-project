<?php
 //Includo la pagina che salva la sessione
 include 'salvaSessione.php';
 ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" href = "home.css">
 
        <title>IKM - Blog</title>
    

    </head>



    <body background="img/mesh-gradient.png">
    <?php
    include 'connessione.php';
    $utente = $_SESSION['Email'];
    //Query per recuperare il nome del blog
    $idBlog = $_SESSION['idBlog'];

    $queryNom = "SELECT Nome_Blog FROM Blog WHERE '$idBlog' = idBlog"  ;
    $exNome = mysqli_query($connessione,$queryNom);
    $arrNom = mysqli_fetch_array($exNome);
    //Creo una variabile per memorizzare il nome del blog e poi stampo il nome
    $nomeBlog = $arrNom[0];
    echo ("<h1> Il nome del blog è" .$nomeBlog. "</h1>");
   
   //Query per rintracciare il tema del blog
   $queryTema = "SELECT Tema FROM Blog WHERE Nome_Blog = '$nomeBlog' AND idBlog = '$idBlog'";
   $exTema = mysqli_query($connessione,$queryTema);
   $tema = mysqli_fetch_array($exTema);
   //Stampo il tema del blog
   echo("<h3 id = 'genere'>Tema: "."<p id = 'temaS'>".$tema[0]."</p>"."</h3>");
   //Memorizzo l'email del creatore assegnado alla nuova variabile il risultato ottenuto sopra dalla query
   $queryCreatore = "SELECT Utente FROM Creatore WHERE Blog = '$idBlog'";
   $exCreatore = mysqli_query($connessione,$queryCreatore);
   $creatore = mysqli_fetch_array($exCreatore);
   $emailCreatore = $creatore[0];
   //query per recuperare nome e cognome del creatore dalla email
   $queryNomeCognome = "SELECT Nome, Cognome FROM Utente WHERE Email = '$emailCreatore'";
   $exNomCog = mysqli_query($connessione,$queryNomeCognome);
   //Memorizzo i risultati all'interno di un array e stampo il nome e cognome del creatore
   $arrNomCog = mysqli_fetch_array($exNomCog);
   echo("<p>Creato da ".$arrNomCog[0]." ".$arrNomCog[1].".</p>");

        mysqli_close($connessione);
        ?>

    <form action = "post.php" method = "post" enctype="multipart/form-data">
    
    
        <?php
        include 'connessione.php';
          //recupero l'id del blog
        $idBlog=$_SESSION['idBlog'];
        $utente = $_SESSION['Email'];
       
        if (isset($_SESSION['login'])){
						echo ("<h1>Ciao " .$_SESSION['Nome'] . "!</h1>");}

      
         //Query che restituisce il numero di post che ha un blog
         $qPost = "SELECT ID_Post FROM Post WHERE Blog = '$idBlog' ";
       //Se non sono presenti post nel blog eseguo questa istruzione altrimenti la seconda
       if($qPost==0){
        echo("<h1>Scrivi il tuo primo post</h1>");
    }else {
        echo("<h1>Aggiungi un post</h1>");
    }
    //Stampo i campi per l'immissione di un post 
    echo("<h2 id = 'block'>Titolo:</h2><br/>");
    echo("<textarea rows ='1' cols = '40' placeholder='Scrivi il titolo' name = 'TitlePost' id = 'titlePost'value ='' maxlength='40'></textarea><br/>");
    echo("<h2 id = 'block'>Testo:</h2></br>");
    echo("<textarea rows ='10' cols = '59'  placeholder='Scrivi il testo' name = 'TextPost' id = 'TextPost' maxlength='500' size='40' value =''></textarea><br/>");
    echo("<p id = 'limitazione'>Il testo inserito deve essere massimo di 500 caratteri.</p>");
    echo("<h2>Inserisci un'immagine</h2>");
    echo("<h6>Dimensione max: 1MB</h6>");
    echo("<input type='file' name='file_img' /></br>");
    echo("</br></br><input class = 'btn' type = 'submit' name = 'Pubblica' value = 'Pubblica'>");
       






    
       //Chiusura della connessione
       mysqli_close($connessione);
       ?>
       
</form>

          
    </body>

    <footer>
            <p>Progetto realizzato per il corso di basi di dati A.A. 2021-2022 da: <br/>
            <br/> Isidoro Allegretti: <a href="mailto:i.allegretti@studenti.unipi.it">i.allegretti@studenti.unipi.it</a>
            </p>
    </footer>

</html>