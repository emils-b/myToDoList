<?php
include_once "DB.php";


class Tasks extends DB {

  //gets all tasks
  public function getTasks() {
    $sql = "SELECT * FROM tasks";
    $stmt = $this->connect()->query($sql);
    $tasks = $stmt->fetchAll();
    return $tasks;
  }

  //gets one task by given task id from DB
  protected function getTask($id) {
    $sql = "SELECT * FROM tasks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $task = $stmt->fetch();
    return $task;
  }

  //creates a new task
  protected function setTask($task, $description) {
    $sql = "INSERT INTO tasks(task, description) VALUES (?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$task, $description]);
  }

  //updates existing task based on id
  protected function updateTask($task, $id) {
    $sql = "UPDATE tasks SET task= ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$task, $id]);
  }

  //updates description of existing task
  protected function updateDescription($description, $id) {
    $sql = "UPDATE tasks SET description= ? WHERE id = ?";
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
