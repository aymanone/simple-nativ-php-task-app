<?php
require "./views/header.php";
?>
<script>
window.addEventListener("load",function(){
    fetch("http://localhost:3000/load").then((res)=>{return res.json();})
    .then((data)=>{
        let tasksDiv=document.querySelector("#tasks");

       
       if (data.response===200){
           data.tasks.forEach((elem)=>{
               let f= `<input type="text"value=${elem.title}>`;
               tasksDiv.innerHTML+=f;
           });
       }
       else{
           alert("nooooo");
       }
    });
})
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

<div id="tasks">
</div>
