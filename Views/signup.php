<?php
$title="sign up";
require "./views/header.php";
?>
<form method="POST" action="/new_user">
    <input type="text" name="firstName" id="fName" placeholder="first name" required>
    <input type="text"  name="lastName" id="lName" placeholder="last name" required>
    <input type="email"  name="mail" id="mail"  placeholder="your mail" required>
    <input type="password" name="password" id="pw" placeholder="pass word" required>
    <input type="submit"  value="new user">
    
</form>

<?php
require "./views/footer.html";
