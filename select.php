<?php
class Select extends Database {

    private $tabname;
    function __construct($tablename) {
         $this -> connectToDb();
        $this -> tabname = $tablename;
    }
############ Метод получения данных с базы по запросу ##########
    function getAllData($cont, $query) {
        if ($sql = mysqli_query($cont, $query)) {
            $data = mysqli_fetch_array($sql);
        }
        return $data; // возвращает результат в массиве
    }

    function setAllData($cont, $query) {
        if ($sql = mysqli_query($cont, $query)) {
            $data = mysqli_insert_id($cont);
        }
        else {
            $data = 0;
        }
        return $data; // возвращает записанный id, если 0 то не записалось
    }

    function delData($cont, $query) {
        if ($sql = mysqli_query($cont, $query)) {
            $data = "Успешно удалено";
        }
        else {
            $data = "Ошибка соединения";
        }
        return $data;
    }

    function updateData($cont, $query) {
        if ($sql = mysqli_query($cont, $query)) {
            $data = "Успешно Обновлена";
        }
        else {
            `$data = "Ошибка соединения";
        }
        return $data;
    }
}
?>
