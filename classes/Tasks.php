<?php
include_once "DB.php";


class Tasks extends DB {

//gets all tasks
  public function getTasks() {
    $sql = "SELECT * FROM tasks";
    $stmt = $this->connect()->query($sql);
    $tasks = $stmt->fetchAll();
    return $tasks;
    //while($row = $stmt->fetch()){
    //  return $row['task'];
    //}
  }

//gets one task by given task id from DB
  protected function getTask($id) {
    $sql = "SELECT * FROM tasks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]); //kad papildinās ar papildus DB datiem, tad ? secībai
    // sql mainīgajā jāsakrīt ar mainigo secību te, jo tie tiek ņemti secīgi
    $task = $stmt->fetch();
    return $task;
    //echo $task['task']. '<br>';
    /*$task = $stmt->fetchAll(); //visticamāk, ka liks tikai fetch
    foreach($task as $t){
      echo $t['task']. '<br>';
    }*/
  }

  //creates a new task
    protected function setTask($task, $description) {
      $sql = "INSERT INTO tasks(task, description) VALUES (?, ?)"; //kad būs papildus vērtības, par katru vērtību viena jauna ?
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$task, $description]); //kad papildinās ar papildus DB datiem, tad ? secībai
      // sql mainīgajā jāsakrīt ar mainigo secību te, jo tie tiek ņemti secīgi
    }

    //updates existing task based on id
    protected function updateTask($task, $id) { //$isDone, $description
      $sql = "UPDATE tasks SET task= ? WHERE id = ?"; //kad būs papildus vērtības, par katru vērtību viena jauna ?
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$task, $id]);
    }

    //updates description of existing task
    protected function updateDescription($description, $id) {
      $sql = "UPDATE tasks SET description= ? WHERE id = ?"; //kad būs papildus vērtības, par katru vērtību viena jauna ?
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$description, $id]);
    }

    //change if task is done
    protected function updateIsDone($isDone, $id) {
      $sql = "UPDATE tasks SET isDone= ? WHERE id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$isDone, $id]);
    }

    //deletes task by its id
    protected function deleteTaskById($id) {
      $sql = "DELETE FROM tasks WHERE id=$id";
      $stmt = $this->connect()->query($sql);
    }


}
