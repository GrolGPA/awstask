<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diary</title>
    <style type="text/css">
        TABLE {
            width: 850px;

        }
        TD, TH {
            padding: 3px;
            border: 0px;
            width: 800px;
        }
    </style>
</head>
<body>
<H1>Welcome to the family diary!</H1>
<H3>Your housework:</H3>
<table>
    <tr>
        <td ><b>Task</b></td>
        <td><b>Doer</b></td>
        <td><b>Comleated</b></td>
        <td><b>Attached file</b></td>
        <td><b>Make complete</b></td>
        <td><b>Change doer</b></td>

    </tr>
<?php

/**
 * Display list of tasks
 */
    foreach ($tasks as $tarray)
    {
        echo "<tr>";
        foreach ($tarray as $key => $value)
        {

            if ($key == "taskID")
            {
                $task_id = $value;
            }
            elseif ($key == "filePath")
            {
                echo "<td><a href=".$value.">".$value."</a></td>";
            }
            else
            {
                echo "<td>".$value."</td>";

            }

        }


        echo "<td><form action=\"Diary\makeDone\\".$task_id."\" method=\"post\">
        <button type=\"submit\"><span>COMPLETE</span></button>
        </form></td>";
        echo "<td>
        <table><tr>
        <form action=\"Diary\chgDoer\\".$task_id."\" method=\"post\">
        <select id=\"doer\" name=\"doer\" size=\"1\">
            <option value=\"1\">Father</option>
            <option value=\"2\">Mother</option>
            <option value=\"3\">Child</option>
        </select>
        <button type=\"submit\"><span>Change</span></button>
        </form> </tr></table></td>";
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
        <input id="upfile" name="upfile" type="file" >
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