<?php
include_once "Tasks.php";


  class TasksContr extends Tasks {

    //creates new task
    public function createTask($task, $description){
      $this->setTask($task, $description);
      echo "New task created <br>";
    }

    //updates task
    public function changeTask($task, $id){
      $this->updateTask($task, $id);
      echo "task updated <br>";
    }

    //updates description
    public function changeDescription($description, $id){
      $this->updateDescription($description, $id);
      echo "description updated <br>";
    }

    //changes if task is done
    public function changeIsDone($isDone, $id){
      $this->updateIsDone($isDone, $id);
      echo "isDone updated <br>";
    }

    //deletes task
    public function deleteTask( $id){
      $this->deleteTask($id);
      echo "DELETED <br>";
    }

  }
