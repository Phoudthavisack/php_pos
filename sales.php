<?php
// 
include('session_admin.php');
include("config.php");

if(isset($_GET['week'])){
    $sql = "SELECT DATE(date) AS date, SUM(order_total) AS order_total FROM orders WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() GROUP BY  DATE(date)  ORDER BY DATE(date) ASC";
}
else if(isset($_GET['month'])){
    $sql = "SELECT DATE(date) AS date, SUM(order_total) AS order_total FROM orders WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() GROUP BY  DATE(date)  ORDER BY DATE(date) ASC";
}
else if(isset($_GET['year'])){
    $sql = "SELECT EXTRACT(YEAR_MONTH FROM date) AS date, SUM(order_total) AS order_total FROM orders GROUP BY  EXTRACT(YEAR_MONTH FROM date)  ORDER BY EXTRACT(YEAR_MONTH FROM date) ASC";
}
else if(isset($_GET['from'],$_GET["to"])){
    $from = $_GET['from'];
    $to = date("Y/m/d", strtotime("+1 day",strtotime($_GET["to"])));
    
    $sql = "SELECT DATE(date) AS date, SUM(order_total) AS order_total  FROM orders WHERE date BETWEEN '$from' AND '$to' GROUP BY  DATE(date) ORDER BY date ASC ";
}
else{
    $sql = "SELECT DATE(date) AS date, SUM(order_total) AS order_total FROM orders WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() GROUP BY  DATE(date)  ORDER BY DATE(date) ASC";
}

$result = $conn->query($sql);

$data = array();
$categories = array();

while($row = $result->fetch_assoc()){
    array_push($data,(int) $row["order_total"]);
    $date = $row["date"];
    array_push($categories, $date);
};
?>

<a href="?week"><button>week</button></a>
<a href="?month"><button>month</button></a>
<a href="?year"><button>year</button></a>
<form action="" method="get">
<label for="from">from</label>
    <input type="date" name="from" id="from"/>
    <label for="to">to</label>
    <input type="date" name="to" id="to"/>
    <button type="submit">view</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div id="chart" style="width: 500px;"></div>

<script>
var options = {
    series: [
        {
        name: "ຍອດຂາຍ",
        data: <?php echo json_encode($data) ?>,
        },
    ],
    chart: {
        type: "bar",
        height: 350,
    },
    plotOptions: {
        bar: {
        borderRadius: 4,
        },
    },
    dataLabels: {
        enabled: false,
    },
    xaxis: {
        categories: <?php echo json_encode($categories) ?>,
    },
    yaxis: {
        labels: {
        show: true,
        formatter: function (val) {
            return Intl.NumberFormat().format(val) + " ₭";
        },
        },
    },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>
<style>
table{
    width:600px;
    border-collapse: collapse;
}
table, th, td {
    border:1px solid black;
}
</style>
<table>
    <tr>
        <th>order_id</th>
        <th>staff</th>
        <th>sales</th>
        <th>date</th>
        <th>tool</th>
    </tr>
    <?php
        $sql = "SELECT * FROM orders ORDER BY date desc";
        $result = $conn->query($sql);
        while($row=$result->fetch_assoc()):
        $id = $row['staff_id'];
        $sql_staff = "SELECT * FROM member WHERE id='$id'";
        $result_staff = $conn->query($sql_staff);
        $staff=$result_staff->fetch_assoc();
    ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php if(isset($staff['name'])){echo $staff['name'];}?></td>
        <td><?php echo number_format($row["order_total"]) . " ₭" ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><a href="#">detail</a></td>
    </tr>
    <?php
        endwhile;
    ?>
</table>