<?php
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";

$task = new TasksContr();
if (isset($_POST['submit'])) {
	$name = $_POST['task'];
	$description = $_POST['description'];
	$task -> createTask($name, $description);
}
?>

<div class="card mb-1">
	<div class="col">
		<div class="col">
			<div class="card mb-1">
				<div class="card body text-center">
					<form method="post" action="" class="card mb-1">
						<input type="text" name="task" class="task_input">
						<input type="text" name="description" class="task_input">
						<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<a href="index.php" class="card-link">Go To Start Page</a>
