<?php
include_once "Tasks.php";


  class TasksView extends Tasks {

//shows all tasks
  /*  public function showTasks(){
      $tasks = $this->getTasks();
      foreach($tasks as $task){
        echo $task['task']." ". $task['dateCreated']. " ". ($task['isDone']==0?"false" : "true").
            " ". $task['description']. '<br>';
      }
    }*/

    public function showTasks(){
      $tasks = $this->getTasks();
      return $tasks;
    }

//shows one task by given task id
    public function showTask($id){
      $task = $this->getTask($id);
      return $task;
      //echo $task['task']. " ", $task['dateCreated']. " ", ($task['isDone']==0?"false" : "true").
      //    " ". $task['description']. '<br>';
    } //isDone noņemot String pēdiņas būs boolean, kuru tad varēs izmantot

  }
