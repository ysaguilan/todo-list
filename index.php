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
				<?php require("includes/connect.php"); ?>
			</ul>
		</div>
		<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-task" placeholder="Add new task..."/>
			
		</form>
	</div>
</body>
</html>