<?php
$host = 'localhost';
$user = 'root';
$dbname = 'site_cms';
$pass = '';
//$port = '1433';

//$DBN = new PDO("sqlsrv:Server=$host;Database=andrey", 'andrey', 'andrey');
$connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!$connect) {
    echo "error!";
}
?>
