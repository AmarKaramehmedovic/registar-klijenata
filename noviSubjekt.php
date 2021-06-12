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

        <label>Adresa:<br/>
        <input name="adresaSubjekta" type="text">
        </label><br/>
		
		<label>Poštanski broj:<br/>
        <input name="postBr" type="number">
        </label><br/>
		
		<label>Mjesto:<br/>
        <input name="mjesto" type="text">
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
        $adresa = $_POST["adresaSubjekta"];
        $postBr = $_POST["postBr"];
        $mjesto = $_POST["mjesto"];
        $kontakt = $_POST["kontaktBr"];
			
        $query = "SELECT nazivSubjekta FROM subjekti WHERE nazivSubjekta = '$naziv';";
        $result = mysqli_query($conn, $query) or die ("Error");

        if(mysqli_num_rows($result) >= 1)
            echo "Subjekt sa unesenim nazivom već postoji!";
        else {
            $sql = "INSERT INTO subjekti (nazivSubjekta, adresa, postBr, mjesto, kontaktBr) values (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssiss', $naziv, $adresa, $postBr, $mjesto, $kontakt);
                mysqli_stmt_execute($stmt);
                echo "Uspješan unos!";
            }
        }
    }

    mysqli_close($conn);

    ?>

</body>
</html>