<?php
// Database Connection File
require_once 'database_connection.php';

// Only process post requests
if(isset($_SERVER["REQUEST_METHOD"]) && strip_tags($_SERVER["REQUEST_METHOD"]) == strip_tags("POST"))
{
	if(isset($_POST['add']))
	{
	    // Task is not empty
		if( isset($_POST['task']) && !empty($_POST['task']) ) 
		{
			// Variable declaration
			$task = trim(strip_tags(htmlspecialchars($_POST['task'])));
			$due_by = trim(strip_tags(htmlspecialchars($_POST['due_by'])));
			
			// Save the task 
			mysqli_query($MYSQLi, "insert into `task` values(0, '".mysqli_real_escape_string($MYSQLi, $task)."', '".mysqli_real_escape_string($MYSQLi, 'Pending')."', '".mysqli_real_escape_string($MYSQLi, $due_by)."')") or die(mysqli_errno());
			
			echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
		}
		else
		{
			echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
		}
	}
	else
	{
		echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
		//die('Sorry, no proper data was passed');
	}
}
else 
{
	echo "<script>window.location='index.php'</script>";  // Redirect back to index.php page
	// Deny access if the request brought to this page is not a POST REQUEST
	//die('Access Denied');
}
?>