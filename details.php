<?php
$page_title = 'Patient Info';
include ('path/header.html');

require_once ('./mysqli_connect.php');

if (isset($_GET['pid']) && is_numeric($_GET['pid'])) { // Already been determined.
    
    $pid = $_GET['pid'];
    
}


?>
<main> 
    <h1>Pertinent Patient Information Listed Below: </h1>
    <form action="viewlabs.php" method="POST">
	Lab Results Document Name: 
	<input type="text" name="pid" size="20">
	<input type="submit" value="View Lab Results " />
	</form>
</main>


<?php 

$q0 = "SELECT iflab FROM patients
INNER JOIN lab_confirm ON patients.f_name = lab_confirm.p_name
where patient_id=$pid";
$r0 = @mysqli_query ($dbc, $q0); // Run the query.

$row0 = mysqli_fetch_array($r0, MYSQLI_ASSOC);

if($row0['iflab']=='0'){
    $q2 = "SELECT * FROM patients
    where patient_id=$pid";
    $r2 = @mysqli_query ($dbc, $q2); // Run the query.
    
    $row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC);
    
    
    echo "<table><tr><th>ID #:  </th><th>First Name:  </th><th>Middle Initial:  </th><th>Last Name:  </th><th>Age:  </th><th>Height:  </th><th>Gender:  </th><th>Medications:  </th><th>Allergies:  </th><th>Conditions:  </th></tr>";
    echo "<tr><td>".$row2['patient_id']."</td><td>".$row2['f_name']."</td><td>".$row2['m_initial']."</td><td>".$row2['l_name']."</td><td>".$row2['age']."</td><td>".$row2['height']."</td><td>".$row2['gender']."</td><td>".$row2['medications']."</td><td>".$row2['allergies']."</td><td>".$row2['conditions']."</td></tr>";
    echo "<table><tr><th>Lab Results Document Name:  </th></tr>";
    echo "<tr><th>No Lab Results Available  </th></tr>";
    
    mysqli_free_result ($r2);
}
else{
    $q1 = "SELECT * FROM patients
    INNER JOIN images ON patients.patient_id = images.user_id
    where patient_id=$pid";
    $r1 = @mysqli_query ($dbc, $q1); // Run the query.
    
    $row1 = mysqli_fetch_array($r1, MYSQLI_ASSOC);
    
    echo "<table><tr><th>ID #:  </th><th>First Name:  </th><th>Middle Initial:  </th><th>Last Name:  </th><th>Age:  </th><th>Height:  </th><th>Gender:  </th><th>Medications:  </th><th>Allergies:  </th><th>Conditions:  </th></tr>";
    echo "<tr><td>".$row1['patient_id']."</td><td>".$row1['f_name']."</td><td>".$row1['m_initial']."</td><td>".$row1['l_name']."</td><td>".$row1['age']."</td><td>".$row1['height']."</td><td>".$row1['gender']."</td><td>".$row1['medications']."</td><td>".$row1['allergies']."</td><td>".$row1['conditions']."</td></tr>";
    echo "<table><tr><th>Lab Results Document Name:  </th></tr>";
    echo "<tr><td>".$row1['img_name']."</td></tr>";
    mysqli_free_result ($r1);
    
}




?>

