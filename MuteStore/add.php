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
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['nama']);
	$notelp = mysqli_real_escape_string($mysqli, $_POST['notelp']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$saran = mysqli_real_escape_string($mysqli, $_POST['saran']);
		
	// checking empty fields
	if(empty($name) || empty($notelp) || empty($email) || empty($saran)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($notelp)) {
			echo "<font color='red'>Nomor Telp field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($saran)) {
			echo "<font color='red'>Saran field is empty.</font><br/>";
		}
		
		//link to the previous pnotelp
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,notelp,email,saran) VALUES('$name','$notelp','$email','$saran')");
		
		//display success messnotelp
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='data.php'>View Result</a>";
	}
}
?>
</body>
</html>
