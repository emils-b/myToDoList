<?php
include_once "Tasks.php";


class TasksView extends Tasks {

  //shows all tasks
  public function showTasks(){
    $tasks = $this->getTasks();
    return $tasks;
  }

  //shows one task by given task id
  public function showTask($id){
    $task = $this->getTask($id);
    return $task;
  }

}
