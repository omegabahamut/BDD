<?php
$username = $_POST['username'];
$password = $_POST['password'];
if ($username == ""){
	header("location: index.php");
}

if ($password == ""){
	header("location: index.php");
}

// 1
	$connectServeur = mysql_connect('localhost','root',"root");
	if(!$connectServeur) {
		die('Failed to connect to server:' );
	}
		//2
	$bdd =  mysql_select_db('sales',$connectServeur);
	if(!$bdd) {
		die('impossible de selectionner la base' );
	}
		//3
	$requete = "select * from user where username='$username' and password='$password'";
	$result = mysql_query($requete);
		//4
	if ($result){
		if (mysql_num_rows($result) == 1){
			echo "ok";
			session_start();
			$_SESSION["username"] = $username;
			header("location: succes.php");
		} else {
			echo "ko";
			header("location:formu.html");
		}
		
	} else {
			die ("mauvaise requete ".$requete);
		}
?>