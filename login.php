<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Umut Sablon</title>
<script>
	function goToRegisterForm()
	{
		window.location = "index.php";
		
	}
	function goToURL(id)
	{
		var innerText = document.getElementById("text_" + id).value;
		window.location = "login.php?update=true&id=" + id + "&textArea="+innerText;
	}
</script>
</head>

<body>
$servername = "Umut";
$username = "Umut";
$password = "admin123";
$dbname = "id";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Perform database operations here

// Close connection
$conn->close();
?>
$sql = "SELECT * FROM id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Process each row of data
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
    }
} else {
    echo "0 results";
}
	<?php
	
	// session_start();
	
	if( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		if( $_POST["name"] == "" )
		{
			session_destroy();
			
			echo "<script>window.location = 'index.php?name=empty&login=failed';</script>";
		}
		else
		{
			$_SESSION["name"] = $_POST["name"];
		}
		
		if( $_POST["surname"] == "" )
		{
			session_destroy();
			
			echo "<script>window.location = 'index.php?surname=empty&login=failed';</script>";
		}
		else
		{
			$_SESSION["surname"] = $_POST["surname"];
		}
		
		if( $_POST["adress"] == "" )
		{
			session_destroy();
			
			echo "<script>window.location = 'index.php?adress=empty&login=failed';</script>";
		}
		else
		{
			$_SESSION["adress"] = $_POST["adress"];
		}
		
		if( $_POST["username"] == "" )
		{
			session_destroy();
			
			echo "<script>window.location = 'index.php?username=empty&login=failed';</script>";
		}
		else
		{
			$_SESSION["username"] = $_POST["username"];
		}
		
		if( $_POST["password"] == "" )
		{
			session_destroy();
			
			echo "<script>window.location = 'index.php?password=empty&login=failed';</script>";
		}
		else
		{
			$_SESSION["password"] = $_POST["password"];
		}
		
	}
	
	$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	
	//echo $url;
	
	$url_components = parse_url($url);
	
	if( isset( $url_components["query"] ) )
	{
		// Use parse_str() function to parse the
		// string passed via URL
		parse_str($url_components["query"], $params);
	}
	
	$servername = "localhost";
	$user_name = "root";
	$pass_word = "";
	
	// Create connection
	// $conn = mysqli_connect($id, $Umut, $admin123,);
	
	// Check connection
	if($conn->connect_error)
	{
		die("Connection failed: ".$conn->connect_error);
	}
	//echo "Connected successfully!";
	
	if( isset($_SESSION["name"]) && 
	    isset($_SESSION["surname"]) &&
	    isset($_SESSION["adress"]) &&
	    isset($_SESSION["username"]) &&
	    isset($_SESSION["password"]) )
	{
	$name = $_SESSION["name"];
	$surname = $_SESSION["surname"];
	$adress = $_SESSION["adress"];
	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	
	/*
	echo "<table>
	<tr><td>Ad:</td><td>$name</td></tr>
	<tr><td>Soyad:</td><td>$surname</td></tr>
	<tr><td>Adres:</td><td>$adress</td></tr>
	<tr><td>Kullanıcı Adı:</td><td>$username</td></tr>
	<tr><td>Şifre:</td><td>$password</td></tr>
	</table>";
	*/
	
	$sql = "CREATE DATABASE IF NOT EXISTS USERS DEFAULT CHARSET=utf8";
	
	if( $conn->query($sql) )
	{
		//echo "Database created successfully!";
	}
	else
		echo "Error in database creation: ".$conn->error;
	
	$sql2 = "CREATE TABLE IF NOT EXISTS USERS.MyUsers (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, surname VARCHAR(30) NOT NULL, adress VARCHAR(120) NOT NULL, username VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL) DEFAULT CHARSET=utf8";
	
	if( $conn->query($sql2) )
	{
		//echo "Table created successfully!";
	}
	else
		echo "Error in table creation: ".$conn->error;
	
	$sql3 = "INSERT INTO USERS.MyUsers(name, surname, adress, username, password) VALUES('$name', '$surname', '$adress', '$username', '$password')";
	
	if( $conn->query($sql3) )
	{
		//echo "Table values inserted successfully!";
		
		session_destroy();
	}
	else
		echo "Error in insertion data: ".$conn->error;
	
	}
	
	
	
	if( isset($params["id"]) && isset($params["delete"]) )
	{
	$sql5 = "DELETE FROM USERS.MyUsers WHERE id =".$params["id"];
	
	if( $conn->query($sql5) )
	{
		//echo "Row deleted from table successfully!";
		
		session_destroy();
	}
	else
		echo "Error in deletion data: ".$conn->error;
	}
	
	if( isset($params["id"]) && isset($params["update"]) && isset($params["textArea"]) ) 
	{
		
	$sql6 = "UPDATE USERS.MyUsers SET name ='" .$params["textArea"]."' WHERE id =".$params["id"];
	
	if( $conn->query($sql6) )
	{
		//echo "Row updated successfully!";
		session_destroy();
	}
	else
		echo "Error in update data: ".$conn->error;
	}
	
	$sql4 = "SELECT * FROM USERS.Umut";
	// $result = $conn->query($id);
	
	echo "<table border = 2 align = center bgcolor = yellow>";
		echo "<th>SEÇ</th><th>ID</th><th>AD<input type = radio id=name name = radioGroup></th><th>SOYAD<input type = radio id=surname name = radioGroup></th><th>ADRES<input type = radio id=adress name = radioGroup></th><th>KULLANICI ADI<input type = radio id=username name = radioGroup></th><th>ŞİFRE<input type = radio id=password name = radioGroup></th><th colspan = 2><input type = button id=deleteButton name = deleteButton value = TOPLU_SİL></th><th><input type = button id=sortButton name = sortButton value = VERİLERİ_SIRALA></th>";
	
	echo "<tr><th>ARAMA</th><th><input type = text size = 4 id = search_id name = search_id></th>
	<th><input type = text size = 4 id = search_name name = search_name></th><th><input type = text size = 4 id = search_surname name = search_surname></th><th><input type = text size = 4 id = search_adress name = search_adress></th><th><input type = text size = 14 id = search_username name = search_username></th><th><input type = text size = 4 id = search_password name = search_password></th><th colspan = 2><input type = button value = ARAMA_YAP></th><th><input type = button id = register name = register value = YENİ_VERİ_EKLE onClick = goToRegisterForm();></th></tr>";
	
	if( $result->num_rows > 0 )
	{
		$rowCounter = 0;
		
		while($row = $result->fetch_assoc())
		{
			$rowCounter++;
			
			if( $rowCounter % 2 == 0 )
				echo "<tr bgcolor = grey>";
			else
				echo "<tr bgcolor = white>";
			
			echo "<td><input type = checkbox id=".$row["id"]." name=".$row["id"]."></td>".
				 "<td>".$row["id"]."</td>".
				 "<td>".$row["name"]."</td>".
				 "<td>".$row["surname"]."</td>".
				 "<td>".$row["adress"]."</td>".
				 "<td>".$row["username"]."</td>".
				 "<td>".$row["password"]."</td>".
				 "<td><a href=login.php?delete=true&id=".$row["id"].">Sil</a></td>".
				 "<td><input id = text_".$row["id"]." type=text size = 4></td><td><a href = 'javascript: goToURL(" . $row["id"].");'>Güncelle</a></td>";
			
			echo "</tr>";
		}
		
		echo "</table>";
	}
	//else
		//echo "No records found!";
	
	?>
</body>
</html>