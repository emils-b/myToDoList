<?php
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";

if(isset($_POST['id'])){
  $id = $_POST['id'];
  $taskC = new TasksContr();
  $task = new TasksView();
  $task = $task ->showTask($id);
  $isDone = $task['isDone'];
  //echo $isDone;
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
?>
