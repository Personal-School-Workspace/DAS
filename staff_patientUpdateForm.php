<?php
include('path/header.html');
?>



<?php

$delId=$_POST["delId"];
$staff_id=$_POST["staff_id"];
$delNam1=$_POST["delNam1"];
$delNam2=$_POST["delNam2"];
$delNam3=$_POST["delNam3"];
$delAge=$_POST["delAge"];
$delHei=$_POST["delHei"];
$delGen=$_POST["delGen"];
$delMed=$_POST["delMed"];
$delAll=$_POST["delAll"];
$delCon=$_POST["delCon"];

require_once ('./mysqli_connect.php');


$q = "Update patients set f_name ='$delNam1', m_initial ='$delNam2', l_name ='$delNam3', age ='$delAge', height ='$delHei', gender ='$delGen', medications ='$delMed', allergies ='$delAll', conditions ='$delCon' where patient_id ='$delId' and provider_id ='$staff_id'";

if (mysqli_query($dbc, $q)) {
    echo "Patient Information Updated";
} else {
    echo "Error Updating Record: " . mysqli_error($conn);
}


mysqli_close($dbc);

?>





<?php 
  include('path/footer.html');
  ?>