<?php
    $connect = mysqli_connect('localhost', 'root', '');
    $select_db = mysqli_select_db($connect, 'blog');
   /* $select = mysqli_query($connect, "SELECT * FROM users");
        while ($result = mysqli_fetch_array($select)) {
            echo "id: $result[id] <br>
                  Заголовок: $result[name] <br>
                  Текс: $result[code]";
        }
        */


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if ($_POST["login"] == "" || $_POST["pass"] == "") {
            echo "Вы не ввели значения!";
        } else {
            $login = $_POST["login"];
            $password = $_POST["pass"];
            $query = "insert into users (login, password) values ('$login', '$password')";
            $select = mysqli_query($connect,  $query);
            if(!$select) {
                echo "Такой пользователь уже существует!";
            } else {
                echo "Пользователь создан!";
            }
        }
    }

?>
    <form action="" method="POST">
        <input type="text" name="login">
        <input type="text" name="pass">
        <input type="submit" name="btn" value="Сохранить">
    </form>
