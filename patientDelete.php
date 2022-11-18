<?php
include('path/header.html');
?>


<body>
<h2>Delete Patient Information</h2>

<form action="patientDeleteForm.php" method="POST">
Patient ID Number:<input type="text" name="deleteInfo" /><br>
<input type="submit" value="Delete" />
</form>

</body>




<?php 
  include('path/footer.html');
  ?>