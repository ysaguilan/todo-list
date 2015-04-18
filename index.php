<!DOCTYPE html>
<html>
<head>
	<title> To-DO List</title>
	<!-- links to css file in css folder-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="wrap">
		<div class="task-list">
			<ul>
			<!--requires connect.php in includes folder-->
				<?php require("includes/connect.php");
				//creates new mysqli connection server, username, password, table
				$mysqli = new mysqli("localhost", "root", "root", "todo");
				//selects all information from the table called tasks orders it by date and acending time(ASC= acension)
				$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
				//goes through query and connection
				if($result = $mysqli->query($query)) {
				//creates new variable called num_rows all information will be placed here
					$numrows = $result->num_rows;
					if ($numrows>0) {
						while ($row=$result->fetch_assoc()) {
							//creates new variable called task_id and equals it to row 'id'
							$task_id = $row["id"];
							//creates new variable called task_name and equals it to row 'name'
							$task_name = $row["name"];
							//calls delete-button class
							echo '<li>
							<span>' .$task_name. '</span>
							<img id="'.$task_id.'""class= "delete-button" width="10px" src="images/close.svg"/>
							</li>';	
						}
					}
				}
				?>
			</ul>
		</div>
		<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-task" placeholder="Add new task..."/>
			
		</form>
	</div>
</body>
<script src="http://code.jquery.com/jquery-lastest.min.js"></script>
<script>
	add_task(); // calling add task function

	function add_task() {
		$('add-new-task').submit(function() {
			var new_task = $('.add-new-task input[name=new-task').val();

			if (new_task != '') {
				$.post('includes/add-task.php', {task: new_task}, function(data) {
					$('add-new-task input[name=new-task']).val();
						$(data).appendTo('task-list ul').hide().fadeIn();)
				});
			}
			return false;
		});
	}
//Jquery for class ".delete-button"
	$('.delete-button').click(function() {
		// variable called current_element value = to $(this)
		var current_element = $(this);
		var task_id = $(this).attr('id');
		//calls arguements in delete-task.php
		$.post('includes/delete-task.php', {id: task_id}, function(){
			//calls variable "current_element"
		current_element.parent().fadeOut("fast", function(){
			$(this).remove();
		});
	});
</script>
</html>