<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Umut Sablon</title>
<?php 
	$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	
	$url_components = parse_url($url);
	
	if( isset( $url_components["query"] ) )
	{
		// Use parse_str() function to parse the
		// string passed via URL
		parse_str($url_components["query"], $params);
	}
	
	if( !isset($params["login"]) )
	{
		if( !session_status() === PHP_SESSION_NONE )
			session_destroy();
	}
	else 
	// session_start(); 
// $_SESSION

?>
<script>
	function formTemizle()
	
	{
		document.getElementbyId("topluSil").addEventListener('click',function(){
			document.getElementById("name").value = "";
		document.getElementById("surname").value = "";
		document.getElementById("adress").value = "";
		document.getElementById("username").value = "";
		document.getElementById("password").value = "";
		});
		// document.getElementById("name").value = "";
		//document.getElementById("surname").value = "";
		// document.getElementById("adress").value = "";
		// document.getElementById("username").value = "";
		// document.getElementById("password").value = "";
	///	 echo str_replace
		// eventListener
	}
	function formSirala()
	
	{
		document.getElementById("name").value = "  ";
		document.getElementById("surname").value = " ";
		document.getElementById("adress").value = " ";
		document.getElementById("username").value = "";
		document.getElementById("password").value = "";
	//	document.CommandText="SELECT" from formSirala = "";
	}
	function formAra()
{ <formaction= "" name='Arama Yap' method="post" type='text' inputtype="submit">
}
	funtion formGuncelle()
		{
		document.getElementById("name").value = "  ";
		document.getElementById("surname").value = " ";
		document.getElementById("adress").value = " ";
		document.getElementById("username").value = "";
		document.getElementById("password").value = "";
		}

function yeniVeri()
{

	document.getElementbyId("yeniVeri").addEventListener('click',function(){
			document.getElementById("name").value = "";
		document.getElementById("surname").value = "";
		document.getElementById("adress").value = "";
		document.getElementById("username").value = "";
		document.getElementById("password").value = "";
)}
</script>
</head>
	
<body>
<form id="form1" name="form1" method="post" action = "login.php">
  <table align = center width="200" border="0">
    <tbody>
      <tr>
        <td>Ad:</td>
        <td><label for="textfield"></label>
        <input type="text" name="name" id="name" value='<?php echo isset( $_SESSION["name"] ) ? $_SESSION["name"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>Soyad:</td>
        <td><input type="text" name="surname" id="surname" value='<?php echo isset( $_SESSION["surname"] ) ? $_SESSION["surname"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>Adres:</td>
        <td><input type="text" name="adress" id="adress" value='<?php echo isset( $_SESSION["adress"] ) ? $_SESSION["adress"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>Kullanıcı Adı:</td>
        <td><input type="text" name="username" id="username" value='<?php echo isset( $_SESSION["username"] ) ? $_SESSION["username"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>Şifre:</td>
        <td><input type="text" name="password" id="password" value='<?php echo isset( $_SESSION["password"] ) ? $_SESSION["password"] : ""; ?>'></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center"><input type="submit" name="submit" id="submit" value="Gönder">
        <input type="button" name="reset" id="reset" value="Toplu Sil" onClick=formTemizle();
></td>
      </tr>
	  <td>&nbsp;</td>
	  <tr>
	  <td align="center"><input type="submit" name="submit" id="submit" value="Verileri Sirala" onClick=formSirala(); >
	  <input type="button" name="reset" id="reset" value="Arama Yap" onClick=formAra();
	<tr>
	  <td align="center"><input type="submit" name="submit" id="submit" value="Guncelle" onClick=formGuncelle(); >
	  <input type="button" name="reset" id="reset" value="Guncelle " onClick=formGuncelle();

</tr>

<tr>
<td  <td align="center"><input type="submit" name="submit" id="submit" value="Yeni Veri Ekle" onClick=yeniVeri(); >


    </tbody>
  </table>
</form>
<?php
	$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	$url_components = parse_url($url);
	
	if( isset( $url_components["query"] ) )
	{
		// Use parse_str() function to parse the
		// string passed via URL
		parse_str($url_components["query"], $params);
	}
	
	if( isset($params["name"] ) && $params["name"] == "empty" )
	echo "Please enter a name for the user!";
	if( isset($params["surname"] ) && $params["surname"] == "empty" )
		echo "Please enter a surname for the user!";
	if( isset($params["adress"] ) && $params["adress"] == "empty" )
		echo "Please enter an adress for the user!";
	if( isset($params["username"] ) && $params["username"] == "empty" )
		echo "Please enter a username for the user!";
	if( isset($params["password"] ) && $params["password"] == "empty" )
		echo "Please enter a password for the user!";
?>
</body>
</html>