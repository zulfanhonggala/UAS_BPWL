<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$notelp = mysqli_real_escape_string($mysqli, $_POST['notelp']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	$saran = mysqli_real_escape_string($mysqli, $_POST['saran']);	
	
	// checking empty fields
	if(empty($name) || empty($notelp) || empty($email) || empty($saran)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($notelp)) {
			echo "<font color='red'>notelp field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		if(empty($saran)) {
			echo "<font color='red'>Saran field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',notelp='$notelp',email='$email',saran='$saran' WHERE id=$id");
		
		//redirectig to the display pnotelp. In our case, it is index.php
		header("Location: data.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$notelp = $res['notelp'];
	$email = $res['email'];
	$saran = $res['saran'];
}
?>
<html>
<head>	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
	<title>Mute Store</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/normalize.css" media="screen">
	<link rel="stylesheet" href="css/grid.css" media="screen">
	<link rel="stylesheet" href="css/style.css" media="screen">
	<link rel="stylesheet" href="plugin/font-awesome/css/font-awesome.css" media="screen">
	<!-- <link rel="stylesheet" href="css/style.min.css" type="text/css" media="screen"> -->
	<!--[if IE]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>Edit Data</title>
</head>

<body>
	<a href="data.php">Data</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>No. telp</td>
				<td><input type="text" name="notelp" value="<?php echo $notelp;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Saran</td>
				<td><input type="text" name="saran" value="<?php echo $saran;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
