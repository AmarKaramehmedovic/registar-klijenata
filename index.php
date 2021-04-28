<?php

	$serverName = "localhost, 80";
	$connectionInfo = array("Database"=>"db", "UID"=>"root", "PWD"=>"rootpass", "CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect($serverName, $connectionInfo);

	if($conn) {
		 //echo "Connection to hvar.erp.hr established!<br />";
	}else{
		 echo "Connection could not be established.<br />";
		 die(print_r( sqlsrv_errors(), true));
	}    
?>


<html>
    <head>
    <title>Registar klijenata</title>
	<link rel="stylesheet" media="screen" href="style.css">
	<link rel="shortcut icon" href="slike/favicon.ico"/>
	<meta charset="utf-8"/>	
    </head>
        
	<body>
		<div class="header">
			<h4><a href="index.php">REGISTAR KLIJENATA:</a></h4>
			<form action="index.php" method="GET" align="center">
				<input id="acSubject" type="text" name="acSubject" placeholder="Traži subjekt" size="25" autofocus>
			</form>
		</div>
		
		
		
        <table id="table1" align="left">
				<tr>
					<th height="30" colspan="5">Kontakti</th>
				</tr>
				
				<tr>
					<th>Subjekt</th>
					<th>Ime</th>
					<th>Prezime</th>
					<th>Email</th>
					<th>Kontakt broj</th>
				</tr>   
            <?php
			if (!empty($_GET['acSubject'])) {
				$input = $_GET['acSubject'];
				
				$sql1= "select *
				from _ARSCRM_vKontakti
				where acSubject LIKE '%$input%'
				order by acSubject";
				
				$sql2= "select acSubject, acAddress, acPost, acName, acPhone
				from _ARSCRM_vSubjekti
				where acSubject LIKE '%$input%'
				order by acSubject";
				
			}else{
				$sql1= "select *
				from _ARSCRM_vKontakti
				order by acSubject";
				
				$sql2= "select acSubject, acAddress, acPost, acName, acPhone
				from _ARSCRM_vSubjekti
				order by acSubject";
			}

			
			
			$stmt1 = sqlsrv_query($conn, $sql1);
			if($stmt1 === false) {
			die( print_r( sqlsrv_errors(), true) );
			}
			
			$stmt2 = sqlsrv_query($conn, $sql2);
			if($stmt2 === false) {
			die( print_r( sqlsrv_errors(), true) );
			}
			
			//table 1
            while($row=sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC) ){
                echo "<tr>";
                echo "<td align='left' width='300'>
						<a name='click' href='?acSubject=".$row["acSubject"]."'>".$row["acSubject"]."</a>
					</td>";
                echo "<td align='center'>" . $row["Ime"] . "</td>";
                echo "<td align='center'>" . $row["Prezime"] . "</td>";
                echo "<td align='center'>" . $row["Email"] . "</td>";
                echo "<td align='center'>" . $row["KontaktBroj"] . "</td>";			
                echo "</tr>";               
            }
			echo "</table>";
			sqlsrv_free_stmt($stmt1);
            ?>
			
			<table id="table2" align="right">
			<tr>
				<th height="30" colspan="5">Subjekti</th>
			</tr>
            <tr>				
				<th>Subjekt</th>
                <th>Adresa</th>
                <th>PoštanskiBroj</th>
                <th>Mjesto</th>
                <th>Kontakt broj</th>
            </tr>
			
			<?php
			//table 2
            while($row=sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC) ){
                echo "<tr>";
                echo "<td align='left' width='300'>
						<a name='click' href='?acSubject=".$row["acSubject"]."'>".$row["acSubject"]."</a>
					</td>";
                echo "<td align='left'>" . $row["acAddress"] . "</td>";
                echo "<td align='center'>" . $row["acPost"] . "</td>";
                echo "<td align='center'>" . $row["acName"] . "</td>";
                echo "<td align='center'>" . $row["acPhone"] . "</td>";			
                echo "</tr>";                
            }
			echo "</table>";
			sqlsrv_free_stmt($stmt2);
            ?>
    </body>
</html>