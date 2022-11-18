<?php
include('path/header.html');
?>



<body>
<h1>Update Patient Information</h1>

<form action="staff_patientUpdateForm.php" method="POST">
Patient ID Number: <input type="text" name="delId" /><br>
Staff ID Number: <input type="text" name="staff_id" /><br>

<h2>Updated Patient Information</h2>

<table border="3"  >
				<tr>
					<td>First Name</td>
					<td align="left"><input type="text" name="delNam1" size="60"></td>
				</tr>
				<tr>
					<td>Middle Initial</td>
					<td align="left"><input type="text" name="delNam2" size="60"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td align="left"><input type="text" name="delNam3" size="60"></td>
				</tr>
				<tr>
					<td>Age</td>
					<td align="left"><input type="text" name="delAge" size="60"></td>
				</tr>
				<tr>
					<td>Height</td>
					<td align="left"><input type="text" name="delHei" size="60"></td>
				</tr>
            <tr>
					<td>Gender</td>
					<td align="left"><input type="text" name="delGen" size="60"></td>
				</tr>
				<tr>
					<td>Medications</td>
					<td align="left"><input type="text" name="delMed" size="60"></td>
				</tr>
				<tr>
					<td>Allergies</td>
					<td align="left"><input type="text" name="delAll" size="60"></td>
				</tr>
				<tr>
					<td>Conditions</td>
					<td align="left"><input type="text" name="delCon" size="60"></td>
				</tr>
				
				<tr>
				<td><input type="submit" name="submit" value="Update" /></td>
 </td></tr></table>








</form>

</body>




<?php 
  include('path/footer.html');
  ?>