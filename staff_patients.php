<?php
include('path/header.html');
?>


<body>
<h2>View Your Patients</h2>

<form action="staff_patientsForm.php" method="POST">
Enter Your Staff ID Number:<input type="text" name="staffid" /><br>
<input type="submit" value="View" />
</form>

</body>




<?php 
  include('path/footer.html');
  ?>