<?php
include_once "classes/TasksView.php";
include_once "classes/TasksContr.php";

//onchange="this.form.submit()"

?>

<div class="card mb-1">
  <?php
  $i=1;
  $id = NULL;
  $tasks = new TasksView();

  $isDone = NULL;
  $taskC = new TasksContr();


  foreach ($tasks -> showTasks() as $task){
    $id=$task['id'];
    ?>
    <div class="col">
      <div class="col">
        <div class="card mb-1">
          <div class="card body text-center">
            <input type="checkbox" data-todo-id="<?php echo $task['id'] ?>"
            class="check-box" name="isDone" <?php if ($task['isDone']==1) echo "checked"?>>
            <h5 class="card-title"><?php echo $i. " " .$task['task'] ?></h5>
            <small class="card-title"><?php echo $task['dateCreated'] ?></small>
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
  <script>
    $(document).ready(function(){
      $(".check-box").click(function(e){
        const id = $(this).attr('data-todo-id');
        $.post('check.php',
            {
              id: id
            },
            //(data) =>{
              //alert(data);
            //}
        );
      })
    });
  </script>
