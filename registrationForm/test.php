<html> 
<head> 
	<title>Edit</title> 
	<link rel="shortcut icon" href="man.gif" /> <!-- title image -->
	<link rel="stylesheet" type="text/css" href="style.css">
</head> 
<body id="body-color"> 

<?php 
define('DB_HOST', 'localhost'); 
	define('DB_NAME', 'DataBiz'); 
	define('DB_USER','root'); 
	define('DB_PASSWORD',''); 
// DB connection 
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
	$db=mysql_select_db(DB_NAME,$con)               or die("Failed to connect to MySQL: " . mysql_error());

// check connection
	if (mysqli_connect_errno($con)) 
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
	else 
		echo "Successfully connected to your databas from all Employes page"."</br>"; 

?>


	<div id="Sign-Up"> 
		<fieldset style="width:98%" > <legend>DataBiz Employees Update Form</legend> <!-- <! a box with line> -->
			<table border="0"> 
				
				<form method="POST" action="edit.php"> 


					<?php

////////////////////////////////////
$id = $_GET['id'];

$com = "SELECT Name, image, Email, Phone, Skill, Post, sex, Birthday, religion, address, Note 
						FROM Employees
						WHERE user_id = $id ";

						// $com = "SELECT * FROM DataBiz WHERE user_id = 1 "

$query = mysql_query($com);
$row = mysql_fetch_assoc($query);

// if($query) echo "Successful............................";
// else echo "not Successful<br>".$com."<br>";

///////////////////////////////////
					//session_start();

					if (!isset($_GET['id'])){
						echo 'No ID was given...';
						exit;
					}
					//else 
					//	$_SESSION['myValue'] = $_GET['id'];
					//echo $update." i'm here to check it's ok ";
					//$_SESSION['varname'] =$update; 

					//session_start();
					//$_SESSION['myValue']=3;
					// echo $_SESSION['myValue']." NO ID Updateing.... ";
						//echo $id." NO ID Updateing.... ";
					?>
					
<input type="hidden" name="iamhidden" value= <?php echo $id ?> />
					<tr> 
						<td>Name</td>
						<td> <input type="text" name="name" value="<?php echo $row['Name']; ?>"></td>
					</tr> 

					<tr>
	<?php
						echo "<td><img src='".$row['image']."'height = '100px' width = '100px'></td>";
	?>
					</tr>

					<tr>
						<td>upload Photo</td>
						<td><input type="file" name="photopath" value="<?php echo $row['image']; ?>"></td>
					</tr>

					<tr> 
						<td>Email</td>
						<td>  <input type="email" name="email" value="<?php echo $row['Email']; ?>"></td>

					<tr> 
						<td>Phone</td>
						<td> <input type="text" name="phone" value="<?php echo $row['Phone']; ?>"></td>
					</tr> 

<?php

$skill = explode(', ', $row['Skill']);

$mo = 1;
$web = 1;
$net = 1;
$game = 1;
$acc = 1;
$man = 1;
  foreach ($skill as  $value) {
  	if(strcmp("MObile Programing",$value))
  		$mo = 0;
else if (strcmp("Web Programing",$value))
  		$web = 0;

  	else if (strcmp("Networking",$value))
  		$net = 0;

else if (strcmp("Game Developer",$value))
  		$game = 0;
  	else if (strcmp("Accounting",$value))
  		$acc = 0;
  	else if (strcmp("Mangement",$value))
  		$man = 0;
 //echo $value;
}
//echo $mo.$web.$net.$game.$acc.$man;
?>

					<tr>
						<td rowspan="3" >Skill </td>		<!-- <!Check box> -->  <!-- name="skill_test" -->
						<!-- <td> <input type="checkbox" name="skill[]" value="MObile Programing" /> Mobile Programing</td> -->
						<td> <input type="checkbox" name="skill[]"  <?php if($mo==0){ echo "checked='checked' ";}?> value="MObile Programing" /> Mobile Programing</td>
						<td> <input type="checkbox" name="skill[]" <?php if($web==0){ echo "checked='checked' ";}?> value="Web Programing" />Web Programing</td>
					</tr>
					<tr>
						<td> <input type="checkbox" name="skill[]" <?php if($net==0){ echo "checked='checked' ";}?> value="Networking" /> Networking</td>
						<td> <input type="checkbox" name="skill[]" <?php if($game==0){ echo "checked='checked' ";}?> value="Game Developer" /> Game Developer</td>
					</tr>
					<tr>
						<td> <input type="checkbox" name="skill[]" <?php if($acc==0){ echo "checked='checked' ";}?> value="Accounting" /> Accounting</td>
						<td> <input type="checkbox" name="skill[]" <?php if($man==0){ echo "checked='checked' ";}?> value="Mangement" />Mangement</td>
					</tr>
					

					<tr> 
						<td>Post</td>
						<td>
							<select name="position">
								<option selected value =""></option> <!-- <!dafult> -->
								<option value="junior programmer"  <?php if($row['Post']== "Junior Programmer"){ echo "selected";}?> >Junior Programmer</option>
								<option  value="programmer"  <?php if($row['Post']== "programmer"){ echo "selected";}?> >Programmer</option>
								<option value="senior programmer" <?php if($row['Post']== "Senior Programmer"){ echo "selected";}?> >Senior Programmer</option>
								<option value="manger" <?php if($row['Post']== "Manger"){ echo "selected";}?> >Manger</option>
							</select>
						</td>
					</tr>

					<tr>
						<td>Sex</td>			<!-- <!radio button> -->
						<td><input type="radio" name="sex" <?php if($row['sex']== "male"){ echo "checked='checked' ";}?> value="male" /> Male</td>
						<td><input type="radio" name="sex" <?php if($row['sex']== "female"){ echo "checked='checked' ";}?>value="female" /> Female</td>
					</tr>

					<tr> 
						<td> Birthday:</td>
						<td><input type="date" name="bday" value="<?php echo $row['Birthday']; ?>"></td>
					</tr>

					<tr> 						<!-- <!radio button> -->
						<td rowspan="3">Religion</td>
						<td> <input type = "radio" name="religion" <?php if($row['religion']== "muslim"){ echo "checked='checked' ";}?>value="muslim" /> Muslim</td>
						<td> <input type = "radio" name="religion" <?php if($row['religion']== "hindu"){ echo "checked='checked' ";}?>value="hindu" /> Hindu</td>
					</tr>
					<tr> 
						<td> <input type = "radio" name="religion" <?php if($row['religion']== "christian"){ echo "checked='checked' ";}?>value="christian" /> Christian</td>
						<td> <input type = "radio" name="religion" <?php if($row['religion']== "buddha"){ echo "checked='checked' ";}?>value="buddha" /> Buddha</td>
					</tr>
					<tr> 
						<td> <input type = "radio" name="religion" <?php if($row['religion']== "other"){ echo "checked='checked' ";}?>value="other" /> Other</td>
					</tr>


					

					<tr><!-- <!problem> -->
						<td rowspan="2"> Address</td>		
					</tr>
					<tr>
						<td colspan="2"> <input type="text" style=width: "100%"; name="address" value="<?php echo $row['address']; ?>"></td>	
					</tr>


					<td colspan="3"><textarea style="width: 100%;" name="note" /><?php echo $row['Note']; ?>"</textarea></td>

					<tr> 
						<td></td>
						<td><input id="button" type="submit" name="submit" value="Ok"></td>
					</tr> 

				</form> 
			</table> 
		</fieldset> 
	</div> 
</body> 
</html>

