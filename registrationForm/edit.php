<?php 
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'DataBiz'); // database name DataBiz
define('DB_USER','root'); 
define('DB_PASSWORD',''); 

// DB connection 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

// check connection
if (mysqli_connect_errno($con)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
} 
else {
	echo "Successfully connected to your database FROM EDIT page"."</br>"; 
}




if (isset($_POST['submit'])){

$update = $_POST['iamhidden'];

	//session_start();
	//$update =  $_SESSION['myValue'];
	//echo $_SESSION['myValue'];

	//session_start();
	//echo $_SESSION['myValue'];

	/*$name  = $_POST['name']; 
	$email = $_POST['email']; 
	$phone = $_POST['phone']; 

	$skill = implode(',', $_POST['skill']);
	$position = $_POST['position'];
	$sex = $_POST['sex'];
	$birth = $_POST['bday'];
	$religion = $_POST['religion']; 
	$address = $_POST['address'];
	$note = $_POST['note'];
	//echo $name;*/
	if (empty($_POST["name"])) 
		$name  = "No name given";
	else $name  = $_POST['name']; 

	if (empty($_POST["email"])) 
		$email  = "No mail given";
	else$email = $_POST['email']; 

	if (empty($_POST["phone"])) 
		$phone  = "No phone given";
	else $phone = $_POST['phone']; 

	if (empty($_POST["skill"])) 
		$skill  = "no skill selected";
	else $skill = implode(' ,', $_POST['skill']);

	if (empty($_POST["position"])) 
		$position  = "no position is selected";
	else $position = $_POST['position'];

	if (empty($_POST["sex"])) 
		$sex  = "not selected";
	else$sex = $_POST['sex'];

	if (empty($_POST["bday"])) 
		$birth  = "no entry";
	else $birth = $_POST['bday'];

	if (empty($_POST["religion"])) 
		$religion  = "no religion selected";
	else $religion = $_POST['religion']; 

	if (empty($_POST["address"])) 
		$address  = "not given";
	else $address = $_POST['address'];

	if (empty($_POST["note"])) 
		$note  = "EMPTY";
	else $note = $_POST['note'];

	/*$query = "UPDATE employees ". 
	//"SET Name = ". "'Md. Rajibul Islam'". 
	"SET Name = ". "'$name'". 
	" WHERE userID = $update"; */

	$query = "UPDATE employees 
	SET Name = '$name', Email = '$email', Phone = '$phone', skill = '$skill', post = '$position', sex = '$sex', Birthday = '$birth',religion = '$religion', address = '$address', note = '$note'
	WHERE user_id = '$update' "; 


	//echo "/br".$query."/br";
	$data = mysql_query($query) or die(mysql_error()); 
	if($data) echo $update." NO ID has been update"; 
	else echo "faysal please check me"; 

	header("Location: allemployees.php");
//"UPDATE employees SET Name = 'Md. Rajibul Islam' WHERE userID = $update"
}
?>

<html>
<body>
	<!--<a href="allemployees.php>">OK</a></td> -->
</body>
</html>
