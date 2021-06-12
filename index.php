<html>
    <head>
    <title>Registar klijenata</title>
	<link rel="stylesheet" media="screen" href="style.css">
	<link rel="shortcut icon" href="slike/favicon.ico"/>
	<meta charset="utf-8"/>	
    </head>
        
	<body>
		<?php
			require_once "connection.php";
			
			session_start();
			if($_SESSION["loggedIn"] != true){
				header("Location: login.php");
				exit;
			}
			
			$username = $_SESSION["username"];
			$dozvola = $_SESSION["dozvola"];
			
			echo '<div class="info">';
			echo '<p>Pozdrav, ' . $username . '! <br> Vaša tip dozvole je ' . $dozvola . '</p>';
			if($dozvola == 'administrator'){
				echo '<p><a href="registracija.php">Registriraj novog korisnika</a></p>';
			}
			echo '<p><a href="logout.php">Odjava</a></p>';
			echo '</div>';
			
			
		?>
	
		
		<div class="header">
			<h4><a href="/registar-klijenata">REGISTAR KLIJENATA:</a></h4>
			<form action="index.php" method="GET" align="center">
				<input id="acSubject" type="text" name="acSubject" placeholder="Traži subjekt" size="25" autofocus>
			</form>
		</div>
		
		
		
        <table id="table1" align="center">   
            <?php
				if (!empty($_GET['acSubject'])) {
					$input = $_GET['acSubject'];
					
					//table kontakti
					echo "
						<tr>
							<th height='30' colspan='5'>Kontakti</th>
						</tr>
						<tr>
							<th>Subjekt</th>
							<th>Ime</th>
							<th>Prezime</th>
							<th>Email</th>
							<th>Kontakt broj</th>
						</tr>";
					
					$sql= "select *
					from kontakti
					where nazivSubjekta LIKE '%$input%'
					order by nazivSubjekta";	
					
					$result = mysqli_query($conn, $sql) or die("Error"); 
					while($row = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td align='left' width='300'>
								<a name='click' href='?acSubject=".$row["nazivSubjekta"]."'>".$row["nazivSubjekta"]."</a>
							</td>";
						echo "<td align='center'>" . $row["ime"] . "</td>";
						echo "<td align='center'>" . $row["prezime"] . "</td>";
						echo "<td align='center'>" . $row["email"] . "</td>";
						echo "<td align='center'>" . $row["kontaktBr"] . "</td>";			
						echo "</tr>";               
					}
				}else{
					//table subjekti
					echo "
						<tr>
							<th height='30' colspan='2'>Subjekti</th>
						</tr>
						<tr>
							<th>Subjekt</th>
							<th>Kontakt broj</th>
						</tr>";
					
					$sql= "select nazivSubjekta, kontaktBr
					from subjekti
					order by nazivSubjekta";				
					
					$result = mysqli_query($conn, $sql) or die("Error");                   
					while($row = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td align='left' width='300'>
								<a name='click' href='?acSubject=".$row["nazivSubjekta"]."'>".$row["nazivSubjekta"]."</a>
							</td>";
						echo "<td align='center'>" . $row["kontaktBr"] . "</td>";			
						echo "</tr>";               
					}
				}
			echo "</table>";
			mysqli_close($conn);
            ?>
    </body>
</html>