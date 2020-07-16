<?php
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";

//onchange="this.form.submit()"


//f(!empty($_POST['isDone']))
//$isDone = $_POST['isDone'];
//$_SESSION["isDone"] = $isDone;
//$samsung1 = $_SESSION["isDone"];
//echo $samsung1."<br />";
?>

<div class="card mb-1">
  <?php
  $i=1;
  $id = NULL;
  $tasks = new TasksView();

  $isDone = NULL;
  $taskC = new TasksContr();

  if (isset($_POST['isDone'])) {
    if($_POST['isDone']=='1'){
      $isDone=0;
    } else{
      $isDone=1;
    } $taskC->changeIsDone($isDone, $id);
  }

  foreach ($tasks -> showTasks() as $task){
    $id=$task['id'];
    ?>
    <div class="col">
      <div class="col">
        <div class="card mb-1">
          <div class="card body text-center">
            <form method="post" action="index.php" class="card mb-1">
              <input type="checkbox" name="isDone" value="1" onClick="this.form.submit()" <?php if ($task['isDone']==1) echo "checked"?>>
            </form>
            <h5 class="card-title"><?php echo $i. " " .$task['task'] ?></h5>
            <p class="card-title"><?php echo $task['dateCreated'] ?></p>
            <p class="card-text"> <?php
            echo $task['description'];
            ?></p>
            <a href="index.php?viewTask=<?php echo $task['id'] ?>">Edit</a>
          </div>
        </div>
      </div>
    </div>
    <?php
    $i++;}
    ?>
    <a href="index.php?addTask=<?php echo $task['id']+1?>" class="card-link">Add new task</a>
  </div>
