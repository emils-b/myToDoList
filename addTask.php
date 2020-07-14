<!DOCTYPE html>
<?php
//izveidos kā atsevišķu objektu
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "mytodolist");

	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: addTask.php');
		}
	}
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
      <form method="post" action="addTask.php" class="col-sm-4">
        <?php if (isset($errors)) { ?>
          <p><?php echo $errors; ?></p>
        <?php } ?>
        <input type="text" name="task" class="task_input">
        <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
      </form>
    <div>
    </div>
  </body>
  </html>
