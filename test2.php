<?php
  print_r(PDO::getAvailableDrivers());
  print "<br>Hello World!<hr>";
?>

<?php
  // Подключение к базе данных
  // $pass = '123';
  // $user = 'root';
  // $dbname = 'blog';
  // $host = 'localhost';
  // $DBN = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
  // if(!$DBN) {
  //   echo "Ругаться!";
  // } else {
  //   echo "Успешно!";
  // }
?>

<?php

// Подключение к базе данных и проба исключений
// $dbname = 'blog';
// $user = 'root';
// $host = 'localhost';
// $pass = '';
//
// try {
//   $DBN = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);
//   $DBN->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//   // набра delect вместо select !!!
//   $DBN->prepare('DELECT name FROM people')->execute();
// }
// catch(PDOException $e) {
//   echo "Ошибка SQL синтаксиса!";
//   file_put_contents("PDOErrors.txt", $e->getMessage(), FILE_APPEND);
// }
?>

<?php
$host = 'REGSQL';
$user = 'andrey';
$dbname = 'andrey';
$pass = 'andrey';
$port = '1433';

$DBN = new PDO("sqlsrv:Server=$host;Database=andrey", 'andrey', 'andrey');//new PDO('odbc:Driver={REGSQL};Server=172.16.1.195;Database=andrey; Uid=andrey;Pwd=andrey');//new PDO("sqlsrv:host=$host;dbname=andrey", 'andrey', 'andrey');//new PDO("sqlsrv:host=$host;dbname=$dbname", $user, $pass);
if(!$DBN) {
    echo "Ругаться";
} else {
    echo "Успешно";
}
// $STN = $DBN->prepare("INSERT INTO users (login, password) values (?, ?)");

// $data = ['rodion', '12345'];
// $STN->execute($data);

?>
