<?php 
	define('DB_HOST', 'localhost'); 
	define('DB_NAME', 'DataBiz'); 
	define('DB_USER','root'); 
	define('DB_PASSWORD',''); 


	// DB connection 
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
	$db=mysql_select_db(DB_NAME,$con)               or die("Failed to connect to MySQL: " . mysql_error());



	if (!isset($_GET['id'])){
		echo 'No ID was given...';
		exit;
	}
	else {
		$delete = $_GET['id'];
		//echo $delete;
		$query = "DELETE FROM employees WHERE user_id = $delete";
		$data = mysql_query($query) or die(mysql_error()); 
		if($data){echo "Delition is successfully complete";

		//header("Location: allemployees.php"); 
?>

		<a href="allemployees.php">Click here to back</a>
<?php
		}
	else echo "The Delition is failed"; 
	}
?>