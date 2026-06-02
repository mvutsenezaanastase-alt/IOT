<?php

$conn = new mysqli(
"localhost",
"root",
"",
"smart_alert"
);

$image =
$_POST['image'];

$motion =
$_POST['motion'];

$led =
$_POST['led'];

$buzzer =
$_POST['buzzer'];

$sql =
"INSERT INTO detections
(image,motion_status,
led_status,buzzer_status)

VALUES
('$image',
 '$motion',
 '$led',
 '$buzzer')";

if($conn->query($sql))
{
    $to =
    "security@gmail.com";

    $subject =
    "Security Alert";

    $message =
    "Motion Detected\n".
    "LED ON\n".
    "Buzzer ON\n".
    "Check Dashboard";

    $headers =
    "From: alert@company.com";

    mail(
    $to,
    $subject,
    $message,
    $headers
    );

    echo "Saved";
}
else
{
    echo "Failed";
}

$conn->close();

?>