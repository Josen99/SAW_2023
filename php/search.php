<?php 
	include("db.php");

	$search= trim($_POST['search']);
	$stmt= mysqli_prepare($con, "SELECT * FROM prodotti WHERE descrizione LIKE ?");
	mysqli_stmt_bind_param($stmt, "s", $search);
	mysqli_stmt_execute($stmt);
	$res= mysqli_stmt_get_result($stmt);

	$myObj = array();
	$i = 0;
	while (/*$row = $res->fetch_array()*/$row= mysqli_fetch_array($res)) {
		//----------------------------------------------
		// --------------- JSON ------------------------
		//----------------------------------------------
		$myObj[$i] = new StdClass; // 2 ore di tempo per risolvere
		$myObj[$i]->id = $row[0];
		$myObj[$i]->descrizione = $row[1];
		$myObj[$i]->marca = $row[2];
		$myObj[$i]->sesso = $row[3];
		$myObj[$i]->tipologia = $row[4];
		$myObj[$i]->prezzo = $row[5];
		$i++;
	}
	$myJSON = json_encode($myObj);
	echo $myJSON; 
/*
	function test_Input($str){
        global $con;
        $str= trim($str);   //La funzione trim toglie degli spazi involontari
        $str= htmlspecialchars($str);   //Converte i caratteri speciali nelle entità HTML corrispondenti
        $str= mysqli_real_escape_string($con, $str);
        return $str;
    }*/ 
?>