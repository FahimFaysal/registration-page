<html>
<body>
	<?php 
	define('DB_HOST', 'localhost'); 
	define('DB_NAME', 'DataBiz'); // database name DataBiz
	define('DB_USER','root'); 
	define('DB_PASSWORD',''); 

	// DB connection 
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

	// check connection
	if (mysqli_connect_errno($con)) 
	echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
	else 
	echo "Successfully connected to your database FROM confirmation page"."</br>"; 

	if(isset($_POST['submit'])) { 
		CreateDatabase();
		NewUser(); 
	}

	function CreateDatabase(){
	//CREATE DATABASE IF NOT EXISTS DBName;
	}


function NewUser() {
	if (empty($_POST["name"])) 
		$name  = "No name given";
	else $name  = $_POST['name']; 
	//echo $name;

	if (empty($_POST["email"])) 
		$email  = "No mail given";
	else$email = $_POST['email']; 

	if (empty($_POST["phone"])) 
		$phone  = "No phone given";
	else $phone = $_POST['phone']; 

	if (empty($_POST["skill"])) 
		$skill  = "no skill selected";
	else $skill = implode(', ', $_POST['skill']);

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

	//////////////////////
	$query = null;

	$file = $_FILES['file'];
	$file_name = $file['name'];
	$file_type = $file['type'];
	$file_size = $file['size'];
	$file_path = $file['tmp_name'];
	//$name = "himel";

	 if($file_name != "" && ($file_type="image/jpeg"|| $file_type="image/png"|| $file_type="image/gif") && $file_size <= 1048576)
	 	if(move_uploaded_file($file_path, 'images/'.$file_name)){
	 		echo "file moved";
	 		// works $query = mysql_query("UPDATE upload SET photo = 'images/$file_name' WHERE name = 'hello'");
	 		//$query = mysql_query("INSERT INTO upload VALUES ('himel','images/$file_name')");
	 		//echo "INSERT INTO upload VALUES ('himel','images/$file_name')";
			//$query = mysql_query("INSERT INTO upload VALUES photo = 'images/$file_name'");
			// $query = mysql_query("INSERT INTO upload VALUES('$name','images/$file_name')");
			// if($query == true){
			//  	echo "file uploaded";
		 // 	}else echo "file upload fail";
		}else 	echo "no move file";

		/// image in db//////////////////////
		// 		//echo "selected an image"."/br";
		// 		// dabase 
		//   	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		//   	$image_name = addslashes($_FILES['image']['name']);
 	//   			// check image or not 
		//   	$image_size = getimagesize($_FILES['image']['tmp_name']);
		//   	if($image_size == FALSE)
		//   		echo "that's not an image";
		//   	 else {
		// 			echo "file is ok";	
		//   	// 	if(!$insert = mysql_query("INSERT INTO store VALUES('','$image_name','$image')"))
		//   	// 		echo "problem to upload image";	
		//   	// 	else {
		// 		 // 				$lastid = mysql_insert_id(); // COLLLECT LOST ID 
		// 		 // 				echo $image_name."   ".$lastid;
		// 		 // 				echo "<img src=show.php?id= '$lastid'>";
				 				
		// 		 // 			}
		// 	}
		// }

	/////////////////////////
	
	$query = "INSERT INTO employees (name, image, email, phone, skill, post, sex, Birthday, religion, address, Note)  
	VALUES ('$name','images/$file_name','$email','$phone','$skill','$position', '$sex', '$birth','$religion','$address','$note')"; 

	$data = mysql_query($query) or die(mysql_error()); 
	if($data) echo "YOUR REGISTRATION IS COMPLETED..."; 
	else{ 
		echo "YOUR REGISTRATION IS NOT COMPLETED"; 

	//echo "name:  ".$name."/br"."email:   ".$email, "phone:      ".$phone."/br". "skill:   ".$skill."/br". "post:   ".$position."/br". "sex:   ".$sex."/br". "Birthday:   ".$birth."/br". "religion:   ".$religion."/br". "address:   ".$address."/br". "Note:  ".$note)  ;
	}
}
?>
</body>
</html>