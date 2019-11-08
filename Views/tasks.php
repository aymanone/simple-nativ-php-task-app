<?php
require "./views/header.php";
?>
<script>
  function handleTask(task,state){
   return true;

  }
</script>
<h1>Tasks</h1>
<form id="new-task" method="POST" action="/create_task">
<label>title &nbsp;</label>
<input type="text" name="title" placeholder="title" required>
<label>description&nbsp;</label>
<textarea cols="30" name="description" rows="10" form="new-task" placeholder="descripe tha task" required></textarea>
<input type="submit" onclick='handleTask(this,0)' value="create task"/>
</form>
<?php
  foreach($tasks as $task){
    echo "<form action='/update_task' method='POST'  id='task".$task["id"]."'>";
    echo "<div class='form-group'>";
    echo "<label>title &nbsp;</label>";
    echo"<input  type='text' required name='title' value=' ".$task["title"]."'>";
    echo "<label> description &nbsp;</label>";
    echo "<textarea cols='30' name='description' rows='10' form='task".$task["id"]."'required>";
    echo($task["description"]);
    echo"</textarea>";
    echo "<label> finish &nbsp; </label>";
    echo "<input  type='checkbox' name='finish'";
    echo ($task["finish"]==1?"checked":"");
    echo">";
    echo "<input type='hidden' name='task_id' value=".$task["id"].">";
    echo "<input type='submit' value='update the task'>";
    echo "</div>";
    echo"</form>";
  }
?>
<script>
  function handleTask(task){
    return true;

  }
</script>
<?php
require "./views/footer.html";
?>
