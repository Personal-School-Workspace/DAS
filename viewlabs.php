<?php
// (A) CONNECT TO DATABASE
require "imageDataConnect.php";

$pid = $_POST["pid"];

// (B) GET IMAGE FROM DATABASE
$stmt = $pdo->prepare("SELECT `img_data` FROM `images` WHERE `img_name`=?");
$stmt->execute([$pid]);
$img = $stmt->fetch();
$img = $img["img_data"];

// (C) OUTPUT IMAGE
$ext = pathinfo($pid, PATHINFO_EXTENSION);
if ($ext=="png") { $ext = "jpeg"; }
header("Content-type: image/" . $ext);
echo $img;