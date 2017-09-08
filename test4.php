<?php


// $select_pdo = $DBN->query("SELECT * FROM header");
// if(!$select_pdo) { echo "error!";}
// while($roww = $res->fetch(PDO::FETCH_NUM)) {
//     echo "$roww["id"]"."<br>"."$roww["name"]"."<br>";
// }

try {
    $pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "Возникла ошибка соединения!".$e->getMessage();
    exit();
}

$sql = "SELECT name, link FROM sites";
$rs = $pdo->query($sql);

// вывод по одному
// $row = $rs->fetch();
// print_r($row);

// echo "<hr>";

// $row = $rs->fetch();
// print_r($row);

// второй вариант
while($row = $rs->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['name']} - {$row['link']}<br>";
}

// третий вариант
// $row = $rs->fetchAll(PDO::FETCH_OBJ);
// print_r($row);
?>
