<!DOCTYPE html>
<?php
//include "Tasks.php";
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";
?>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<title>MyToDoList</title>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-4">My To Do List</h1>
			<p class="lead">For Printful bootcamp</p>
			<hr>
		</div>
	</div>
	<div class="container">
<?php
if (isset($_GET['viewTask'])){
	include "viewTask.php";
}elseif (isset($_GET['addTask'])) {
	include "addTask.php";
}else {
	include "viewAllTasks.php";
}
 ?>
	</div>
</div>
</body>
</html>
