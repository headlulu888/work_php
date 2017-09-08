<?php
    require_once "head.php";
 ?>

 <?php
function getTab($tab, $name) {
include "connection.php";
    $rows = [];
    if($name == '')
        $query = "SELECT * FROM $tab";
    else
        $query = "SELECT * FROM $tab WHERE id = '$name'";

    $query1 = $connect->query($query);
    // var_dump($query1);
    while($row = $query1->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }
        return $rows;
  }

function getTabValueRow($tab, $name, $column) {
include "connection.php";
    $rows = '';
    $query = "SELECT $column FROM $tab WHERE id = '$name'";
    $query1 = $connect->query($query);
    while($row = $query1->fetch(PDO::FETCH_ASSOC)) {
                       $rows = $row['code'];
                    }

                    return $rows;
  }
  ?>
    <!-- шапка -->
    <?php
    $idcontent = 1;
    if($_GET['cont'] != '') {
         $idcontent = $_GET['cont'];
    }
    $rows = getTab('content', $idcontent);

    $header_cont = getTabValueRow('header', $rows[0]['id'], 'code');
    echo $header_cont;
     ?>
    <!-- контент -->
   <?php
   echo $rows[0]['code'];

   ####podval#####
    $foot_cont = getTabValueRow('footer', $rows[0]['id'], 'code');
echo  $foot_cont;
    require_once "foot.php";
 ?>
