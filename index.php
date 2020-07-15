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
    <div>
      <h1>My To Do List</h1>
      <hr>
    </div>
    <div class="col-sm-4">
			<?php
			$task = new TasksView();
			$task -> showTasks();

			$task2 = new TasksView();
			$task2 -> showTask(18);

			$task3 = new TasksContr();
			$task3 -> changeTask("changed", 18);

			//$task4 = new TasksContr();
			//$task4 -> createTask("created with changed setTask", "new description");

			$task5 = new TasksContr();
			$task5 -> changeDescription("description changed", 24);

			$task6 = new TasksContr();
			$task6 -> changeIsDone(1, 25);

			//$task7 = new TasksContr();
			//$task7 -> deleteTask(17);

			//JavaScript, lai delete poga maina krāsu, var arī citām pogām tādu

			 ?>
		</div>
  </body>
  </html>
