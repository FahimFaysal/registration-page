<html>
<head> 
	<title> The Employees List </title> 
</head>
<body>
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
	<!--//////////////////////// print DB ////////////////////////////// --> 
	<?php
	echo "<table border='1'>
	<tr>	
	<th>*</th>				
	<th>ID</th>
	<th>Employeed Name</th>
	<th>Photo</th>
	<th>Email Address</th>
	<th>Phone Number</th>
	<th>Skill</th>
	<th>Current Post</th>
	<th>Gender</th>
	<th>Date of Birth</th>
	<th>Religion</th>
	<th>Adress</th>
	<th>About</th>
	</tr>";
	?>
	<!--////// pagination page //////////////// -->
	<form method="POST" action="">
		<?php
		/// pagination 
		$num_rec_per_page = 6; // 

		if (isset($_GET["page"])) {
 			$page  = $_GET["page"]; // every time else 1st time
 		} else {
			$page=1; // 1st time 
		}; 

		$start_from = ($page-1) * $num_rec_per_page; 

		$query = mysql_query("SELECT * FROM employees LIMIT $start_from, $num_rec_per_page");
		//$num_rows = mysql_num_rows($query);
		//echo "nubmer of row is :".$num_rows;

		while($row = mysql_fetch_assoc($query)) { //Fetches a result row as an associative, a numeric array, or both
			echo "<tr>";
			$temp = $row['user_id'];

			echo '<td><input type="checkbox" name="ticked[]" value="' . $row['user_id'] . '"></td>';

			echo "<td>". $row['user_id'] . "</td>" ;			
			echo "<td>". $row['Name'] . "</td>" ;
			echo "<td><img src='".$row['image']."'height = '100px' width = '100px'></td>" ;
			echo "<td>". $row['Email'] . "</td>" ;
			echo "<td>". $row['Phone'] . "</td>" ;
			echo "<td>". $row['Skill'] . "</td>" ;
			echo "<td>". $row['Post'] . "</td>" ;
			echo "<td>". $row['sex'] . "</td>" ;
			echo "<td>". $row['Birthday'] . "</td>" ;
			echo "<td>". $row['religion'] . "</td>" ;
			echo "<td>". $row['address'] . "</td>" ;
			echo "<td>". $row['Note'] . "</td>" ;
			
			//<td><input id="button" type="submit" name="edit"   value="Edit"></td>
			//<td><input id="button" type="submit" name="delete" value="Delete"></td>
			?>
			
			<td><a href="test.php?id=<?php echo $row['user_id']; ?>">Edit</a></td>
			<td><a href="delete.php?id=<?php echo $row['user_id']; ?>">Delete</a></td> 
			<!-- <td><a href="test.php?param1=$row['user_id']&amp;param2=$page">Delete</a></td> -->


			<?php

			echo "</tr>";

		}
		// echo '<td>.<input type="submit" name="submit" value="submit" />.</td>' ;
		echo "</table>";
		echo '<input type="submit" name="submit" value="Delete Marked" />';


		?>

	</form>

	<?php

		//////// pagination page link ///////////////////

	$sql = "SELECT * FROM employees"; 
		$rs_result = mysql_query($sql); //run the query
		$total_records = mysql_num_rows($rs_result);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 

		echo "<a href='allemployees.php?page=1'>".'|<'."</a> "; // Goto 1st page  

		for ($i=1; $i<=$total_pages; $i++) { 
			echo "<a href='allemployees.php?page=".$i."'>".$i."</a> "; 
		}; 
		echo "<a href='allemployees.php?page=$total_pages'>".'>|'."</a> "; // Goto last page

		/////////////delete row using checkbox///////////

		if(isset($_POST['submit'])){

			echo "button working ";
			if(!empty($_POST['ticked'])){
				echo "not empty";
				//$implode = implode(', ', $_POST['ticked']);
				//echo $implode;

				foreach ($_POST['ticked'] as $value) {
					//echo "$value <br>";
					$delete = mysql_query("DELETE FROM employees WHERE user_id='$value'");
				}
				//$delete = mysql_query("DELETE FROM employees WHERE user_id='$implode'");

				//////////////////reload /////////////////////////
				header("Location: allemployees.php?page=$page");
				
			}
		}
		else
			echo "not sumbited";
		//////////////////////////////////
		?>
	</body>
	</html>

