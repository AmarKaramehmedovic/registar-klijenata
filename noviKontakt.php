<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="POST">
        <label>Naziv subjekta:<br/>
        <input name="nazivSubjekta" type="text" required>
        </label><br/>

        <label>Ime:<br/>
        <input name="imeKontakta" type="text">
        </label><br/>
		
		<label>Prezime:<br/>
        <input name="prezimeKontakta" type="text">
        </label><br/>
		
		<label>Email:<br/>
        <input name="email" type="email">
        </label><br/>
		
		<label>Kontakt broj:<br/>
		<input type="tel" name="kontaktBr" pattern="[0-9\s\/\-\+]*">
        </label><br/><br/>
		
        <input name="submit" id="submit" type="submit" value="Unesi">
    </form>

    <?php
	echo '<p><a href="../registar-klijenata">Povratak na početnu</a></p>';
	
	require_once "connection.php";
    
	session_start();
	if(!isset($_SESSION["loggedIn"])){
		header("Location: login.php");
		exit;
	}

    if (isset($_POST["submit"])) {

		$naziv = $_POST["nazivSubjekta"];
        $ime = $_POST["imeKontakta"];
        $prezime = $_POST["prezimeKontakta"];
        $email = $_POST["email"];
        $kontakt = $_POST["kontaktBr"];
			
        $query = "SELECT ime, prezime FROM kontakti WHERE ime = '$ime' AND prezime = '$prezime';";
        $result = mysqli_query($conn, $query) or die ("Error");

        if(mysqli_num_rows($result) >= 1)
            echo "Kontakt sa unesenim imenom i prezimenom već postoji!";
        else {
            $sql = "INSERT INTO kontakti (nazivSubjekta, ime, prezime, email, kontaktBr) values (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'sssss', $naziv, $ime, $prezime, $email, $kontakt);
                mysqli_stmt_execute($stmt);
                echo "Uspješan unos!";
            }
        }
    }

    mysqli_close($conn);

    ?>

</body>
</html>