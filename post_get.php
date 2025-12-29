<?php
// Prevent errors if name/age aren't set yet
echo $_GET['name'] ?? '';
echo $_GET['age'] ?? '';
?>

<a href="<?= $_SERVER['PHP_SELF'] ?>?name=John&age=30">Click</a>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="age">Age: </label>
        <input type="text" name="age">
    </div>
    <input type="submit" value="Submit" name="submit">
</form>