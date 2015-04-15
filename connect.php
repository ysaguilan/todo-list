<?php
$mysqli = ne mysqli('localhost', 'root', 'root', 'tasks');
//$mysqli -> connect_error then we want it to die and have this message
if ($mysqli->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno . ')'
		 . $mysqli ->connect_error);
}
else {
	// if connection is created successfully
	echo "Connection Made";
}
//commands mysqli to close
$mysqli->close();
?>