<?php

$todos = [];

if (file_exists("data_todos.txt")) {
    $dataFile = file_get_contents("data_todos.txt");
    $todos = $dataFile == ""  ? [] : unserialize($dataFile);
}

if (isset($_GET["status"]) && isset($_GET["key"])) {
    $todos[$_GET["key"]]["status"] = $_GET["status"];
    $dataTodos = serialize($todos);
    file_put_contents("data_todos.txt", $dataTodos);
    header("http://localhost/Codepolitan/PHP%20Basic/todo.php");
}

if (isset($_GET["delete"]) && isset($_GET["key"])) {
    unset($todos[$_GET["key"]]);
    $dataTodos = serialize($todos);
    file_put_contents("data_todos.txt", $dataTodos);
    header("http://localhost/Codepolitan/PHP%20Basic/todo.php");
}

if (isset($_POST["todo"])) {
    $todos[] = ["name" => $_POST["todo"], "status" => 0];
    $dataTodos = serialize($todos);
    file_put_contents("data_todos.txt", $dataTodos);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
</head>

<body>
    <h2>Todo App - Rifki Ilham Lutfika</h2>

    <form action="http://localhost/Codepolitan/PHP%20Basic/todo.php" method="post">
        <input type="text" name="todo" placeholder="input your todo.." />
        <button type="submit">Add</button>
    </form>

    <form action="" method="get">
        <table border="2" style="margin-top: 10px;">
            <thead>
                <td>checklist</td>
                <td>name</td>
                <td></td>
            </thead>

            <?php
            if (count($todos) > 0) {
                foreach ($todos as $key => $value) { ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="checklist" <?php echo $value["status"] == 1 ? "checked" : "" ?>
                                onclick="window.location.href='http://localhost/Codepolitan/PHP%20Basic/todo.php?status=<?php echo $value["status"] == 1 ? 0 : 1 ?>&key=<?php echo $key ?>'" />
                        </td>
                        <td>

                            <?php if ($value["status"] == 1) { ?>
                                <del><?php echo $value["name"] ?></del>
                            <?php } else { ?>
                                <p><?php echo $value["name"] ?></p>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="http://localhost/Codepolitan/PHP%20Basic/todo.php?delete=1&key=<?php echo $key ?>" onclick="return confirm('yakin hapus data todo <?php echo $value['name'] ?>')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

        </table>
    </form>

</body>

</html>