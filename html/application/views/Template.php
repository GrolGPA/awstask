<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Family diary</title>
</head>
<body>
<?php application\models\Session::init(); ?>

    <H1 aling='center'>Family diary</H1>

<?php
include 'application/views/'.$content_view;
if (\application\models\Session::get('loggedIn') == true )
{
    include 'application/views/'.$content_view;
}
?>





</body>
</html>