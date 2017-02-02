<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Podaj swe imie szmatlawcze</p>

<form method="post" action="index.php">

<input type="text" name="imie" />
<input type="text" name="nazwisko" />
<input type="submit" value="Slij to." />

</form>

<p>Oto kompletna lista szmatlawcow:</p>

<?php

 
if (isset($_POST["imie"])){
	$imie = $_POST["imie"];
	$imie = mysqli_escape_string($imie);
}
else {
	$imie = NULL;
	echo "Nie podales imienia szmatlawca.";
}

	if (isset($_POST["nazwisko"])){
$nazwisko = $_POST["nazwisko"];
$nazwisko = mysqli_escape_string($nazwisko);

} else {
	$nazwisko = NULL;
	echo "Nie podales nazwiska szmatlawca.";
}

	

$servername = "localhost:8889";
$username = "user";
$password = "padl";
$dbname = "test_database";

$dbh = new PDO('mysql:host=localhost;dbname=test_database' , $username, $password);


function putName($dbh, $imie, $nazwisko){
	$sth = $dbh->prepare( 'INSERT INTO `ListaSzmatlawcow`(`imie`, `nazwisko`) VALUES ($imie, $nazwisko)');

		$sth->execute();
}


putName($dbh,$imie,$nazwisko);

function getList($dbh) {
	$sql = 'SELECT  imie, nazwisko FROM ListaSzmatlawcow';
	foreach ($dbh->query($sql) as $row) {
		print $row['imie'] . "\t";
		print $row['nazwisko'] . "\r";
		print "\r";
	}
	}

getList($dbh);

$dbh = NULL;






 ?>

</body>
</html>