<?php
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";

//changes if task is done or not depending on checkbox status, for viewAllTasks.php
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $taskC = new TasksContr();
  $task = new TasksView();
  $task = $task ->showTask($id);
  $isDone = $task['isDone'];
  if(empty($id)){
    echo 'error';
  }else {
    if ($isDone==1){
      $isDone=0;
      $taskC ->changeIsDone($isDone, $id);
    } elseif ($isDone==0) {
      $isDone=1;
      $taskC ->changeIsDone($isDone, $id);
    }
    else {
      header("Location: index.php");
    }
  }
}

//for form from addTask.php to create new task
function createTaskFromPage($task){
  if (isset($_POST['submit'])) {
  	$name = $_POST['task'];
  	$description = $_POST['description'];
  	$task -> createTask($name, $description);
  }
}


//for form from viewTask.php to delete task
function deleteTaskFromPage($taskC, $id){
  if (isset($_POST['delete'])) {
  	$taskC -> deleteTask($id);
    header('location: index.php');
  }
}

//for form from viewTask.php to change task
function changeTaskFromPage($taskC, $id){
  if (isset($_POST['submit_ch'])) {
  	$description = $_POST['description'];
    $name = $_POST['task'];
  	$taskC ->changeTask($name, $id);
  	$taskC -> changeDescription($description, $id);
    header('location: index.php');
  }
}

?>
