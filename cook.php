<?php
setcookie('name', 'brad', time() + 86400 * 30);
if(isset($_COOKIE['name'])) {
echo $_COOKIE['name'];
};