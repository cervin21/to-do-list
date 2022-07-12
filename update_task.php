<?php
// Database Connection File
require_once 'database_connection.php';

// Check to be sure that the only request we can process is GET REQUEST
if(isset($_SERVER["REQUEST_METHOD"]) && strip_tags($_SERVER["REQUEST_METHOD"]) == strip_tags("GET"))
{
    // Make sure ID is not empty
	if(isset($_GET['task_id']) && !empty($_GET['task_id'])) 
	{
		// Set the task_id
		$task_id = trim(strip_tags($_GET['task_id']));
		
		// Set the task to Completed
		mysqli_query($MYSQLi, "update `task` set `status` = '".mysqli_real_escape_string($MYSQLi, 'Completed')."' where `task_id` = '".mysqli_real_escape_string($MYSQLi, $task_id)."' limit 1") or die(mysqli_errno());
		// Redirect back to index.php page
		echo "<script>window.location='index.php'</script>";  
	}
	else
	{
	    // Redirect back to index.php page
		echo "<script>window.location='index.php'</script>"; 
		//die('Sorry, no proper data was passed');
	}
}
else 
{
    // Redirect back to index.php page
	echo "<script>window.location='index.php'</script>";  
	// Denies access if not a GET REQUEST
	//die('Access Denied');
}
?>