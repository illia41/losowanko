<html>
	<head>
		<meta charset="utf-8" lang="pl-PL"/>
		<title> osoba </title>
		<link href="style2.css" type="text/css" rel="Stylesheet"/>
	</head>
	<body>
		<div id="obrazek">
			<img src="download.png" alt="santa">
		</div>
		<div id="skrypt">
			<?php
				if(isset($_POST['button'])){
					$i = rand(1, 21);
					$serwer = 'localhost';
					$user = 'root';
					$haslo = '';
					$baza = 'wyspa';
					if(!$dblink = mysqli_connect($serwer, $user, $haslo, $baza)){
						echo "<p>nie udalo sie nawiazac polaczenia</p><br>";
					}
					else{
					echo "<p>polaczenie zostalo nawiazane</p>";
					}
					if(!mysqli_select_db($dblink, $baza)){
						echo "<p>nie udalo sie wybrac bazy</p>";
						mysqli_close($dblink);
						exit();
					}
					else { echo "<p>baza zostala wybrana</p><br>";}
					if(isset($i)){
					$zapytanie = "SELECT imie FROM pracownicy WHERE id= $i AND bedzie=true";}else{echo "error";}
					if(!$result = mysqli_query($dblink, $zapytanie)){
						echo "<p>nie udalo sie wykonac zapytania</p><br>";
						mysqli_close($dblink);
						exit();
					}
					else{
						$osoba = mysqli_fetch_row($result);
						echo "<p>twoja osoba na gift to $osoba[0]</p><br>";
						}
					if(!mysqli_close($dblink)){
						echo "nie udalo sie zamknac bazy";
					}
					else{
						echo "<p>baza zostala zamknieta</p>";
					}
				}
			?>
		</div>
	</body>
</html>