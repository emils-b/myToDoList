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

  if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];

		mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
		header('location: index.php');
  }

	if (isset($_GET['viewTask'])){
		$id = $_GET['viewTask'];
		$sql = "SELECT * FROM tasks WHERE id=$id";
		$task = mysqli_query($db, $sql);
		if (mysqli_num_rows($task) > 0) {
			 //output data of each row
			while($row = mysqli_fetch_assoc($task)) {
				echo $row['id']. "<br>";
				echo $row['task'];
			}
		}else {
			echo "0 results";
		}
		//header('location: viewTask.php');
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
    <div class="col-sm-4">
      <table>
        <thead>
          <tr>
            <th>N</th>
            <th>Tasks</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // select all tasks if page is visited or refreshed
          $tasks = mysqli_query($db, "SELECT * FROM tasks");
          $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
            <tr>
              <td> <?php echo $i; ?> </td>
              <td class="task"> <?php echo $row['task']; ?>
								<a href="viewTask.php">x</a>
								<a href="index.php?viewTask=<?php echo $row['id'] ?>">x</a>
							</td>
              <td class="delete">
                <a href="index.php?del_task=<?php echo $row['id'] ?>">x</a>
              </td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
      </div>
  </body>
  </html>
