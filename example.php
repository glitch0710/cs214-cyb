
<form action="" method="GET">
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" />
    <br><br>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" />
    <br><br>
    <button type="submit">Submit Form</button>
</form>

<?php

if (isset($_GET["email"])){
    echo "logged in";
}else{
    echo "no form submitted yet!";
}

?>
