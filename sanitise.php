<?php
// We now check $_POST because the data is sent in the body, not the URL
if (isset($_POST['submit'])) {
    echo $_POST['name'];
    echo $_POST['age'];
}
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
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
// if i  wantedn security i would rap them in a array and add htmlspecialcharts ok
// or we ise filter input so i know it exits i just have no time to go depp i know its there so if i need it i will get ack or googl it later 
