<html>
<head>
	<title>PHP DB Connection</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['SSN']))
		{
			$_SESSION['SSN']=0;
			$_SESSION['salary']=0;
			$_SESSION['error']="no";
		}
		settype($_SESSION['SSN'],"integer");
		settype($_SESSION['salary'],"integer");
		$formSt="<form name='f1' action='view.php' method='post'>";
		$formEn="</form>";
		$formSSN="SSN : <input type='number' name='ssn' value='".$_SESSION['SSN']."'><br>";
		$formSalary="Salary : <input type='number' name='salary' value='".$_SESSION['salary']."'><br>";
		
		echo $formSt.$formSSN.$formSalary;
		
		if($_SESSION['error']=="yes")
		{
			echo '<script>alert("'.$_SESSION['etype'].'");</script>';
		}
		$_SESSION['SSN']=0;
		$_SESSION['salary']=0;
		$_SESSION['error']="no";
	?>
	<input type="submit" value="View Record">
	<input type="submit" value="Insert" formaction="insert.php">
	<input type="submit" value="update" formaction="update.php">
	<input type="submit" value="delete" formaction="delete.php">
	<input type="submit" value="reset" formaction="reset.php">
	<?php echo $formEn?>
</body>
</html>