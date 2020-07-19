<?php
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";
include_once "functions.php";

$task = new TasksContr();
createTaskFromPage($task);
?>

<!--Page to create new task -->
<div class="card mb-1">
	<form method="post" action="" class="card mb-1">
		<input type="text" name="task" class="task_input" placeholder="Task">
		<input type="text" name="description" class="task_input" placeholder="Description">
		<button type="submit" name="submit" id="add_btn" class="btn btn-light">Add Task</button>
	</form>
</div>


<a href="index.php" class="card-link">See all tasks</a>
