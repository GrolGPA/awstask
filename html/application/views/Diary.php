<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diary</title>
    <style type="text/css">
        TABLE {
            width: 850px; /* Ширина таблицы */
            border-collapse: collapse; /* Убираем двойные линии между ячейками */
        }
        TD, TH {
            padding: 3px; /* Поля вокруг содержимого таблицы */
            border: 0px; /* Параметры рамки */
        }
    </style>
</head>
<body>
<H1>Welcome to the family diary!</H1>
<H3>Your housework:</H3>
<table>
    <tr>
        <td><b>Task</b></td>
        <td><b>Doer</b></td>
        <td><b>Done</b></td>
        <td><b>Attached file</b></td>
    </tr>
<?php

/**
 * Display list of tasks
 */
    foreach ($tasks as $key)
    {

    echo "<tr>";
        foreach ($key as $value)
        {
            echo "<td>".$value."</td>";
        }
        echo "</tr>";
    }
?>
</table>

<H3>Add new task:</H3>
<form enctype="multipart/form-data" action="Diary/addTask" method="post">
    <p>
        <label>Task: </label>
        <input id="task" value="" name="task" type="text" size="20" required="required" />
    </p>
    <p>
        <label>Distribute: </label>
        <select id="taskDistrib" name="taskDistrib" size="1">
            <option value="1">Father</option>
            <option value="2">Mother</option>
            <option value="3">Child</option>
        </select>
    </p>
    <p>
        <label>Upload file (only image): </label><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
        <input id="file" name="file" type="file" >
    </p>
    <p>
    <p>
        <button type="submit"><span>Save</span></button>
        <button type="reset"><span>Reset</span></button>
    </p>
    </p>
</form>
</body>
</html>