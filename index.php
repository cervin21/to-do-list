<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Weekly Task List</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>

<br><br><br><br>



<div class="col-md-3"></div>
<div class="col-md-6 well" style="padding-bottom:0px !important;">
    <h3 class="text-primary" style="margin-top:0px;">Weekly Task List</h3>
    <hr style="border-top:1px dotted #ccc;"/>
    <div class="col-md-2"></div>
    <div class="col-md-12">
        
        <form method="POST" class="form-inline" action="add_task.php">
            <input placeholder="Enter a task"type="text" class="form-control" name="task" style="min-width:50%" required/>
            <select class="form-control" name="due_by" id="due_by">
              <option value="Sunday">Sunday</option>
              <option value="Monday">Monday</option>
              <option value="Tuesday">Tuesday</option>
              <option value="Wednesday">Wednesday</option>
              <option value="Thursday">Thursday</option>
              <option value="Friday">Friday</option>
              <option value="Saturday">Saturday</option>
            </select>
            <button class="btn btn-primary form-control" name="add">Submit Task</button>
        </form>
        
    </div>
    <br /><br /><br />
    <table class="table" style="margin-bottom:0px !important;">
        <thead>
            <tr>
                <th>#</th>
                <th>Task</th>
                <th>Due By</th>
                <th>Status</th>
                <th colspan="2">Complete</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        
		// Database Connection File
        require 'database_connection.php';
        
		// Check for tasks
        if( mysqli_num_rows( $check_tasks = mysqli_query($MYSQLi, "select * from `task` order by `task_id` asc")) )
        {
            $line_number = 1;
			// Display the tasks
            while( $get_tasks = mysqli_fetch_array($check_tasks) ) 
            {
                ?>
                <tr>
                    <td><?php echo $line_number++?></td>
                    <td><?php echo $get_tasks['task']?></td>
                    <td><?php echo $get_tasks['due_by']?></td>
                    <td><?php echo $get_tasks['status']?></td>
                    <td>
                        <?php
                        if(isset($get_tasks['status']) && $get_tasks['status'] != "Completed"){
                            echo '<a href="update_task.php?task_id='.$get_tasks['task_id'].'" style="padding:3px 3px;"><span title="Set Task to Completed">
                            <img width="30px" src="https://www.yourweightmatters.org/wp-content/uploads/2016/12/check-1769866_1280.png"/>
                            </span></a>&nbsp;&nbsp;';
                        }
                        ?>
                         
                    </td>
                    <td>
                        
                         <a href="delete_task.php?task_id=<?php echo $get_tasks['task_id']?>" style="padding:3px 3px;"><span title="Remove Task">
                             <img width="30px" src="https://www.texasmarijuanapolicy.org/wp-content/uploads/2017/05/Red-X.png"/>
                            </span></a>
                    </td>
                </tr>
                <?php
            }
        }
        else
        {
            echo 'No task has been added to the system yet';
        }
        ?>
        </tbody>
    </table>
</div>


</body>
</html>