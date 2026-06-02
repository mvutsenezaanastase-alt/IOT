<?php

$uploadDir = "uploads/";

$imageName =
"IMG_" . time() . ".jpg";

$filePath =
$uploadDir . $imageName;

$data =
file_get_contents("php://input");

file_put_contents(
$filePath,
$data
);

echo $imageName;

?>