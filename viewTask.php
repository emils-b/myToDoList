<?php
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";

$task = new TasksView();
$taskC = new TasksContr();

$id = $_GET['viewTask'];
$task = $task -> showTask($id);
/*
if (isset($_GET['viewTask'])){
  $id = $_GET['viewTask'];
  $task = $task -> showTask($id);
}
*/

if (isset($_POST['submit_task'])) {
	$name = $_POST['task'];
	$taskC ->changeTask($name, $id);
  header('location: index.php');
}

if (isset($_POST['submit_description'])) {
	$description = $_POST['description'];
	$taskC -> changeDescription($description, $id);
  header('location: index.php');
}

if (isset($_POST['delete'])) {
	$taskC -> deleteTask($id);
  header('location: index.php');
}

?>

<div class="card mb-1">
    <div class="col">
      <div class="col">
        <div class="card mb-1">
          <div class="card body text-center">
            <h5 class="card-title"><?php echo $task['task'] ?></h5>
            <p class="card-text"> <?php
            echo $task['description'];
            ?></p>
            <form method="post" action="" class="card mb-1">
  						<input type="text" name="task" class="task_input" value="<?php echo $task['task'] ?>">
  						<button type="submit" name="submit_task" id="ch_btn" class="add_btn">Save</button>
  					</form>
            <form method="post" action="" class="card mb-1">
              <input type="text" name="description" class="task_input" value="<?php echo $task['description']; ?>">
              <button type="submit" name="submit_description" id="add_btn" class="add_btn">Save</button>
            </form>
            <form method="post" action="" class="card mb-1">
              <button type="submit" name="delete" id="add_btn" class="add_btn">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="index.php" class="card-link">Go To Start Page</a>
