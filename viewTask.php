<?php
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";
include_once "functions.php";

$task = new TasksView();
$taskC = new TasksContr();
$id = $_GET['viewTask'];
$task = $task -> showTask($id);

deleteTaskFromPage($taskC, $id);
changeTaskFromPage($taskC, $id);

?>

<!--Page to edit task-->
<div class="card mb-1">

  <form method="post" action="" class="card mb-1">
    <h6>Task</h6>
    <input type="text" name="task" class="task_input" value="<?php echo $task['task'] ?>">
    <h6>Description</h6>
    <input type="text" name="description" class="task_input" value="<?php echo $task['description']; ?>">
    <button type="submit" name="submit_ch" id="ch_btn" class="btn btn-light">Save</button>
  </form>

  <form method="post" action="" class="card mb-1">
    <button type="submit" name="delete" id="add_btn" class="btn btn-light">Delete</button>
  </form>

</div>
<a href="index.php" class="card-link">See all tasks</a>
</div>
