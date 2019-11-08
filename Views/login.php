<?php
$title="login";
require "./views/header.php";
?>
<form method="POST",action="/login">
    <input type="email"  name="mail" id="mail"  placeholder="your mail" required>
    <input type="password" name="password" id="pw" placeholder="pass word" required>
    <input type="submit" value="login">
    
</form>

<?php
require "./views/footer.html";
