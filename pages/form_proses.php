<?php
include("../assets/con2.php");
extract($_POST);
$sql = "INSERT INTO `contactdata`(`name`,  `email`,`message`) VALUES ('".$name."','".$email."', '".$message."')";
$result = $mysqli->query($sql);
if(!$result){
    die("Couldn't enter data: ".$mysqli->error);
}
echo '<script type="text/javascript">';
echo ' alert("JavaScript Alert Box by PHP")';  //not showing an alert box.
echo '</script>';
header('location:contact');
$mysqli->close();
?>
=