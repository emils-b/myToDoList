<?php
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";
?>

<!--This page shows all tasks -->
<div class="card mb-1" style="background-color: #f9f9fa">
  <?php
  $tasks = new TasksView();
  foreach ($tasks -> showTasks() as $task){
    $id=$task['id'];
    ?>

    <div class="card body text-center">
      <div class="card-header">
        <input type="checkbox" data-todo-id="<?php echo $task['id'] ?>"
        class="check-box" name="isDone" <?php if ($task['isDone']==1) echo "checked"?>
        <h5 class="card-title"> <?php echo $task['task'] ?></h5>
      </div>
      <p class="card-text"> <?php echo $task['description']?></p>
      <div class="card-footer"><small class="card-title">Created on <?php echo $task['dateCreated'] ?></small></div>
      <a href="index.php?viewTask=<?php echo $task['id'] ?>" class="btn btn-light">Edit</a>
    </div>


    <?php
  }
  ?>
  <a href="index.php?addTask=new" class="btn btn-secondary">Add new task</a>
</div>

<script>
$(document).ready(function(){
  $(".check-box").click(function(e){
    const id = $(this).attr('data-todo-id');
    $.post('functions.php',
    {
      id: id
    }
  );
})
});
</script>
