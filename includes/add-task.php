<?php
//creates variables that hold tasks, date, time(also tables)
$task =strip_tags($_POST['task']);
$date = date('Y-m-d');
$time = date('H:i:s');
//conects to connect.php
include ('connect.php');
//creates new mysqli
$mysqli = new mysqli('localhost', 'root', 'root', 'tasks');
//creates new query to insert values task, date, time into the table called tasks
$mysqli-> query("INSERT INTO tasks VALUES('', '$tasks', '$date', '$time')");
//queriies tasks that we have; will allow us to go through it
$query = "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'"
//takes results from query
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_associ()) {
		$task_id = $row['id'];
		$task_name = $row['task'];
	}
}
//closes connection
$mysqli->close();

echo '<li><span>' . $task_name . '</span><img id="' . $task_id. '" class="delete-button" width="10px" src="images/close.svg" /></li>';