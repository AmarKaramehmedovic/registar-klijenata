<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="POST">
        <label>Korisničko ime:<br/>
        <input name="username" type="text" required>
        </label><br/>

        <label>Lozinka:<br/>
        <input name="password" type="password" required>
        </label><br/>
		
		<label>Dozvola:<br/>
		<select name="dozvola">
		  <option value="administrator">Administrator</option>
		  <option value="editor">Editor</option>
		</select>
		</label><br/><br/>
		
        <input name="submit" type="submit" value="Pošalji">
    </form>

    <?php
	echo '<p><a href="../registar-klijenata">Povratak na početnu</a></p>';
	
	require_once "connection.php";
    
	session_start();
	
	if($_SESSION["dozvola"] != 'administrator'){
		header("Location: ../registar-klijenata");
		exit;
	}

    if (isset($_POST["submit"])) {

		$username = $_POST["username"];
        $password = $_POST["password"];
        $dozvola = $_POST["dozvola"];
        $hashPassword = password_hash($password, CRYPT_BLOWFISH);
			
        $query = "SELECT korisnicko_ime FROM korisnici WHERE korisnicko_ime = '$username';";
        $result = mysqli_query($conn, $query) or die ("Error");

        if(mysqli_num_rows($result) >= 1)
            echo "Korisnicko ime vec postoji!";
        else {
            $sql = "INSERT INTO korisnici (korisnicko_ime, lozinka, dozvola) values (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'sss', $username, $hashPassword, $dozvola);
                mysqli_stmt_execute($stmt);
                echo "Uspjesan unos!";
            }
        }
    }

    mysqli_close($conn);

    ?>

</body>
</html>