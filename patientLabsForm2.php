<?php
include('path/header.html');
?>



<?php



$patient_id=$_POST["patient_id"];

$f_name=$_POST["f_name"];

require_once ('./mysqli_connect.php');


$q = "Update images set user_id ='$patient_id' where user_id = '0'";

$q2 = "Update lab_confirm set iflab ='1' where p_name = '$f_name'";
mysqli_query($dbc, $q2);

if (mysqli_query($dbc, $q)) {
    echo "Patient Information Updated";
} else {
    echo "Error Updating Record: ";
}


mysqli_close($dbc);

?>





