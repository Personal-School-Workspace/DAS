<?php
$page_title = 'Register';
include ('path/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    require_once ('./mysqli_connect.php');
    
    $errors = array();
    
    
    if (empty($_POST['fname'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['fname']));
    }
    
    if (empty($_POST['lname'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $flast = mysqli_real_escape_string($dbc, trim($_POST['lname']));
    }
    
    
    if (empty($_POST['medid'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['medid']));
    }
    
    
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
        if(!preg_match('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/',$e)){
            $errors[] = 'Invalid email address.';
        }
        
    }
    
    
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Your password did not match the confirmed password.';
        } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
            if(!preg_match('/^\w{8,}$/',$p)){
                $errors[] = 'Your password should be at least eight characters.';
            }
        }
    } else {
        $errors[] = 'You forgot to enter your password.';
    }
    
    if (empty($errors)) {
        
        
       $q = "SELECT admin_id FROM admin WHERE (pass=SHA2('$p',512) AND email='$e' )";
        $r = @mysqli_query($dbc, $q);
        $num = @mysqli_num_rows($r);
        if ($num < 1) {
            
            
            
            $q = "INSERT INTO admin (f_name, l_name, med_id, email, pass) VALUES ('$fn', '$flast', SHA2('$ln',512), '$e', SHA2('$p',512))";
            $r = @mysqli_query ($dbc, $q); 
            if ($r) {
                
                echo '<tr><td><h1>Thank you!</h1>
		      <p>You are now registered. </p><p><br /></p></td></tr>';
                
                
            } 
            else {
                
                
                echo '<tr><td><h1>System Error</h1>
			   <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
                
                
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p></td></tr>';
                
            }
            
            mysqli_close($dbc);
            
            
            include ('path/footer.html');
            exit();
        }else {
            echo '<tr><td><p>This user is already in the database!<p></td></tr>';
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



<form method="POST" action="register.php">
			
			<table border="3"  >
				<tr>
					<td>First Name</td>
					<td align="left"><input type="text" name="fname" size="31"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td align="left"><input type="text" name="lname" size="31"></td>
				</tr>				
				<tr>
					<td>Medical ID</td>
					<td align="left"><input type="text" name="medid" size="31"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td align="left"><input type="email" name="email" size="31"></td>
				</tr>
            <tr>
					<td>Password</td>
					<td align="left"><input type="password" name="pass1" size="31"></td>
				</tr>
				<tr>
					<td>Repeat password</td>
					<td align="left"><input type="password" name="pass2" size="31"></td>
				</tr>
				
				<tr>
				<td><input type="submit" name="submit" value="Register" /></td>
 </td></tr></table>
</form>

  <?php 
  include('path/footer.html');
  ?>

