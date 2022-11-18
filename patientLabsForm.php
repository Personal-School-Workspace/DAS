<?php
include('path/header.html');
?>


<?php
// (B) SAVE IMAGE INTO DATABASE
if (isset($_FILES["upload"])) {
  try {
    // (B1) CONNECT To DATABASE
    require "imageDataConnect.php";

    // (B2) READ IMAGE FILE & INSERT
    $stmt = $pdo->prepare("INSERT INTO `images` (`img_name`, `img_data`) VALUES (?,?)");
    $stmt->execute([$_FILES["upload"]["name"], file_get_contents($_FILES["upload"]["tmp_name"])]);
    echo "OK";
  } catch (Exception $ex) { echo $ex->getMessage(); }
}
?>


<body>
<h1>Update Patient Information</h1>

<form action="patientLabsForm2.php" method="POST">

Patient ID Number: <input type="text" name="patient_id" /><br>
Patient First Name: <input type="text" name="f_name" /><br>

<h2>Finalize Lab Entry</h2>
<td><input type="submit" name="submit" value="Finalize Lab Entry" /></td>



</form>

</body>


<?php 
 include('path/footer.html');
 ?>