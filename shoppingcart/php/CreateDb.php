<?php


function CreateDb(){

$conn = mysqli_connect("cse.unl.edu:3306",'ppoudel','7hAMmX','ppoudel');
$sql = "SELECT * from bakery";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
return $result;
}
}

?>
