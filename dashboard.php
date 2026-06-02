<?php

$conn =
new mysqli(
"localhost",
"root",
"",
"smart_alert"
);

$result =
$conn->query(
"SELECT * FROM detections
ORDER BY id DESC"
);

?>

<!DOCTYPE html>

<html>

<head>

<title>Smart Alert Dashboard</title>

<style>

body{
font-family:Arial;
background:#f4f4f4;
}

table{
width:100%;
background:white;
border-collapse:collapse;
}

th,td{
padding:10px;
border:1px solid black;
text-align:center;
}

img{
width:200px;
}

</style>

</head>

<body>

<h2>SMART ALERT DASHBOARD</h2>

<table>

<tr>
<th>ID</th>
<th>Image</th>
<th>Motion</th>
<th>LED</th>
<th>Buzzer</th>
<th>Date</th>
</tr>

<?php while(
$row=
$result->fetch_assoc()
){ ?>

<tr>

<td>
<?= $row['id']; ?>
</td>

<td>
<img src="uploads/<?= $row['image']; ?>">
</td>

<td>
<?= $row['motion_status']; ?>
</td>

<td>
<?= $row['led_status']; ?>
</td>

<td>
<?= $row['buzzer_status']; ?>
</td>

<td>
<?= $row['created_at']; ?>
</td>

</tr>

<?php } ?>

</table>

</body>

</html>