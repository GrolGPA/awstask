<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php
/**
 * Show greeting
 */
$username = \application\models\Session::get('username');
echo '<h3>You are logged in as: '.$username.'</h3>';
?>

<a href="Main">Show the diary</a>
<br><br>
<a href="Main/logout">Logout</a>
</body>
</html>