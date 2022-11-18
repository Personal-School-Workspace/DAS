<?php
include('path/header.html');
?>

<?php

$deleteInfo=$_POST["deleteInfo"];

require_once ('./mysqli_connect.php');


$q = "Delete from patients where patient_id ='$deleteInfo'";

if (mysqli_query($dbc, $q)) {
    echo "Patient Information Erased";
} else {
    echo "Error Deleting Patient Information: " . mysqli_error($conn);
}


mysqli_close($dbc);

?>


<?php 
  include('path/footer.html');
  ?>