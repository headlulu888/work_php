<?php
// $host = "localhost";
// $user = "root";
// $pass = "";
// $dbname = "site_cms";

// $DBN = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
// // if(!$DBN) {
// //     echo "Error!!!";
// // } else {
// //     echo "Good!!!";
// // }

// $connect = mysqli_connect($host, $user, $pass, $dbname);
// // if($connect) { echo "Good!!"; } else { echo "Error"; }
// $select = ("SELECT * FROM header");
// // if($select) { echo "true"; } else { echo "false"; }
// $result = mysqli_query($connect, $select);
// // if($result) { echo "true"; } else { echo "false"; }
// // $query = mysqli_query($DBN, $select);
// // if($query) { echo "true"; } else { echo "false"; }
// while($row = mysqli_fetch_assoc($result)) {
//     echo "id= ".$row["id"]."<br>"."name= ".$row["name"]."<br>";
// }
?>

<?php
$hostdb = "localhost";
$namedb = "blog";
$userdb = "root";
$passdb = "";

try {
    $conn = new PDO("mysql:host=$hostdb;dbname=$namedb", $userdb, $passdb);
    if($conn) { echo "true"; } else { echo "false"; }
    $conn->exec("SET CHARSET SET utf8");
    $sql = "SELECT * FROM sites WHERE id IN(1, 3)";
    if($result !== false) {
        $cols = $result->columnCount();
        echo 'Numberr of return columns: '.$cols.'<br>';

        foreach ($result as $row) {
            echo $row['id']. ' - '. $row['name']. ' - '.$row['category']. ' - '.$row['link']. '<br>';
        }
    }
    $conn = null;
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>
