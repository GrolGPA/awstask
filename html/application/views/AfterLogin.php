<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
/**
 * Show greeting
 */
echo 'Hello, '.$this->model->getData().'<br>';
if(application\models\Session::get(loggedIn))
{
    echo "<meta http-equiv='refresh' content='2'>";
}
?>
<form action="window.location.reload()" method="post">
<a href="Main/logout">Logout</a>
</body>
</html>