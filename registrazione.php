<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "home	.css">
		
		<title>IKM - Registrazione</title>
	</head>

	<body background="img/mesh-gradient.png">
	

		<form action = "info.php" method="post">
			<div class = "reg-box">
				<h1>Iscriviti</h1>
				<div class = "regText">
					<input type = "text" placeholder="Nome" name = "fname" maxlength="20" value ="">
				</div>

				<div class = "regText">
					<input type = "text" placeholder="Cognome" name = "lname" maxlength="20" value ="">
				</div>

				<div class = "" id = "sexType">
					<p>Sesso:</p>
					<label class="container"><p>M &nbsp; &nbsp; &nbsp; &nbsp;</p>  
						<input type = "radio" name = "sesso" value = "M">
						<span class="checkmark"></span>
					</label>
					<label class="container"><p>F &nbsp; &nbsp; &nbsp; &nbsp;</p> 
						<input type = "radio" name = "sesso" value = "F">
						<span class="checkmark"></span>
					</label>
				</div>

				<div class = "regText" id = "email">
					<input type = "text" placeholder="E-mail" name = "email" maxlength="40" value ="">
				</div>

				<div class = "regText" id = "paese">
					<input type = "text" placeholder="Paese di residenza" name = "paese" maxlength="40" value ="">
				</div>

				<div class = "regText" id = "nascita">
					<input type = "text" onfocus="(this.type='date')" placeholder="Data di nascita" name = "nascita" value ="">
				</div>

				<div class = "regText">
					<input type = "password" placeholder="Password (8-20 character)" maxlength="20" name = "pass" value ="">
				</div>
				<input class = "btn" type = "submit" name = "Sign up" value = "Sign up">
			</div>

			<div id="tornaHome">
				<a href = "index.php">Torna alla home</a>
			</div>

		</form>
	</body>

</html>