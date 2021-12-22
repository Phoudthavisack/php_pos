<?php
include('config.php');

$date = "2021/12/18";

$from = $date;
$to = date("Y/m/d", strtotime("+1 day",strtotime($date)));

$sql = "SELECT SUM(order_total) AS total FROM orders WHERE date BETWEEN '$from' AND '$to' ORDER BY date ASC ";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo $row['total'].'<br>';
}

// $sql = "SELECT EXTRACT(day FROM date) AS day, SUM(order_total) AS total FROM orders GROUP BY EXTRACT(day FROM date)";
// $result = $conn->query($sql);

// while($row = $result->fetch_assoc()){
//     echo $row['day']." - ".$row['total'].'<br>';
// }

$sql = "SELECT EXTRACT(YEAR_MONTH FROM date) AS Ym, SUM(order_total) AS total FROM orders GROUP BY Ym";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo $row['Ym']." - ".$row['total'].' month: '.'<br>';
}

?>