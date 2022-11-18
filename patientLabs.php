<?php
include('path/header.html');
?>



<form action ="patientLabsForm.php" method="post" enctype="multipart/form-data">
  <input type="file" name="upload" accept=".png,.gif,.jpg,.webp" required>
  <input type="submit" name="submit" value="Upload Image">
</form>



<?php 
  include('path/footer.html');
  ?>