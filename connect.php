<?php
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$phoneNumber = $_POST['phoneNumber'];

	$conn = new mysqli('localhost','root','','users'); # db connection 
	if($conn->connect_error){ // if an error happens
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users_data(fullName, email, phoneNumber) values(?, ?, ?)"); # insert query, question mark for each column name
		$stmt->bind_param("sss", $fullName, $email, $phoneNumber); # 3 s ->  3 values of string typy
		$execval = $stmt->execute(); # execute query
		# echo $execval;
		echo "Registro Guardado"; # after clicking enviar button
		$stmt->close();
		$conn->close();
	}
?>