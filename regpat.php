<?php
$page_title = 'regpat';
include ('path/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    require_once ('./mysqli_connect.php');
    
    $errors = array();
    
    
    if (empty($_POST['f_name'])) {
        $errors[] = 'You forgot to enter patient first name.';
    } else {
        $na = mysqli_real_escape_string($dbc, trim($_POST['f_name']));
    }
    
    if (empty($_POST['m_initial'])) {
        $errors[] = 'You forgot to enter patient initial.';
    } else {
        $nm = mysqli_real_escape_string($dbc, trim($_POST['m_initial']));
    }
    
    if (empty($_POST['l_name'])) {
        $errors[] = 'You forgot to enter patient last name.';
    } else {
        $nl = mysqli_real_escape_string($dbc, trim($_POST['l_name']));
    }
    
    
    if (empty($_POST['age'])) {
        $errors[] = 'You forgot to enter patient age.';
    } else {
        $nb = mysqli_real_escape_string($dbc, trim($_POST['age']));
    }
    
    if (empty($_POST['height'])) {
        $errors[] = 'You forgot to enter patient height.';
    } else {
        $nc = mysqli_real_escape_string($dbc, trim($_POST['height']));
    }
    
    
    if (empty($_POST['gender'])) {
        $errors[] = 'You forgot to enter patient gender.';
    } else {
        $nd = mysqli_real_escape_string($dbc, trim($_POST['gender']));
    }
    
    if (empty($_POST['meds'])) {
        $errors[] = 'You forgot to enter matient medications. If none enter N/A.';
    } else {
        $ne = mysqli_real_escape_string($dbc, trim($_POST['meds']));
    }
    
    
    if (empty($_POST['all'])) {
        $errors[] = 'You forgot to enter patient allergies. If none enter N/A';
    } else {
        $nf = mysqli_real_escape_string($dbc, trim($_POST['all']));
    }
    
    if (empty($_POST['cond'])) {
        $errors[] = 'You forgot to enter patient conditions. If none enter N/A';
    } else {
        $ng = mysqli_real_escape_string($dbc, trim($_POST['cond']));
    }
    
    if (empty($_POST['provide'])) {
        $errors[] = 'You forgot to enter patient conditions. If none enter N/A';
    } else {
        $provide = mysqli_real_escape_string($dbc, trim($_POST['provide']));
    }
    
    
    if (empty($errors)) {
        
        
        $q101 = "SELECT patient_id FROM patients";
        $r = @mysqli_query($dbc, $q101);
        $num = @mysqli_num_rows($r);
        if ($num < 100) {
            
            
            
            $q = "INSERT INTO patients (f_name, m_initial, l_name, age, height, gender, medications, allergies, conditions, signed_waiver, provider_id) VALUES ('$na', '$nm', '$nl', '$nb', '$nc', '$nd', '$ne', '$nf', '$ng', 1, '$provide')";
            $r = @mysqli_query ($dbc, $q);
            
            $q2 = "INSERT INTO lab_confirm (p_name, iflab) VALUES ('$na', 0)";
            $r = @mysqli_query ($dbc, $q2);
            if ($r) {
                
                echo '<tr><td><h1>Thank you!</h1>
		      <p>This patient is now registered. </p><p><br /></p></td></tr>';
                
                
            } else {
                
                
                echo '<tr><td><h1>System Error</h1>
			   <p class="error">This patient could not be registered due to a system error. We apologize for any inconvenience.</p>';
                
                
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p></td></tr>';
                
            }
            
            mysqli_close($dbc);
            
            
            include ('path/footer.html');
            exit();
        }else {
            echo '<tr><td><p>This patient is already in the database!<p></td></tr>';
        }
        
    } else {
        
        echo '
      <tr><td><h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) {
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p><p><br /></td></tr></p>';
        
    }
    
    mysqli_close($dbc);
    
}
?>



<form method="POST" action="regpat.php">
			
			<table border="3"  >
				<tr>
					<td>First Name</td>
					<td align="left"><input type="text" name="f_name" size="60"></td>
				</tr>
				<tr>
					<td>Middle Initial</td>
					<td align="left"><input type="text" name="m_initial" size="60"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td align="left"><input type="text" name="l_name" size="60"></td>
				</tr>
				<tr>
					<td>Age</td>
					<td align="left"><input type="text" name="age" size="60"></td>
				</tr>
				<tr>
					<td>Height</td>
					<td align="left"><input type="text" name="height" size="60"></td>
				</tr>
            <tr>
					<td>Gender</td>
					<td align="left"><input type="text" name="gender" size="60"></td>
				</tr>
				<tr>
					<td>Medications</td>
					<td align="left"><input type="text" name="meds" size="60"></td>
				</tr>
				<tr>
					<td>Allergies</td>
					<td align="left"><input type="text" name="all" size="60"></td>
				</tr>
				<tr>
					<td>Conditions</td>
					<td align="left"><input type="text" name="cond" size="60"></td>
				</tr>
				<tr>
					<td>Health Provider ID</td>
					<td align="left"><input type="text" name="provide" size="60"></td>
				</tr>
				
				<tr>
				<td><input type="submit" name="submit" value="Register" /></td>
 </td></tr></table>
</form>






 