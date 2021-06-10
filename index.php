<html>
    <head>
    <title>Registar klijenata</title>
	<link rel="stylesheet" media="screen" href="style.css">
	<link rel="shortcut icon" href="slike/favicon.ico"/>
	<meta charset="utf-8"/>	
    </head>
        
	<body>
		<?php
			$servername = "localhost:3306";
			$user = "root";
			$pass = "";	
			$db = "registar_klijenata_db"; 
			
			$conn = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());
		?>
	
		
		<div class="header">
			<h4><a href="index.php">REGISTAR KLIJENATA:</a></h4>
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
					
					$sql1= "select *
					from kontakti
					where nazivSubjekta LIKE '%$input%'
					order by nazivSubjekta";	
					
					$result = mysqli_query($conn, $sql1) or die("Error"); 
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
					
					$sql1= "select nazivSubjekta, kontaktBr
					from subjekti
					order by nazivSubjekta";				
					
					$result = mysqli_query($conn, $sql1) or die("Error");                   
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