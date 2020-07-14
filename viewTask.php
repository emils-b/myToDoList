<!DOCTYPE html>
<?php
//izveidos kā atsevišķu objektu un servera parametri jānorāda kā atsevišķi mainīgie
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
    <div>
      <?php
      //query var kā atsevišķu mainigo rakstit
      //jāpārbauda vai vispār atdod rindu, skatīt linku zemāk
      //https://www.w3schools.com/php/php_mysql_select.asp
      include "index.html"
      //$id = intval($_GET['id']);
      $sql = "SELECT * FROM tasks WHERE id=$id";
      //$sql = "SELECT * FROM tasks WHERE id IN (8)";
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

      //$conn->close(); jāpačeko vai šis nav jāliek
      ?>
    </div>
  </body>
</html>
