<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    require_once ('./staff_login_functions.inc.php');
    
    require_once ('./mysqli_connect.php');
    
    list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
    
    if ($check) {
        
        session_start();
        //Stuff
        $_SESSION['staff_id']=$data['staff_id'];
        $_SESSION['fname']=$data['fname'];
        
        $url = absolute_url ('index.php');
        header("Location: $url");
        exit();
        
    } else {
        
        $errors = $data;
        
    }
    
    mysqli_close($dbc);
    
}
$page_title = 'Login';
include ('path/header.html');


if (!empty($errors)) {
    echo '<tr><td><h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
    foreach ($errors as $msg) {
        echo " - $msg<br />\n";
    }
    echo '</p><p>Please try again.</p></td></tr>';
}

?>

<h1>Login</h1>
<form method="post" action="staff_login.php">
			
			<table border="3"  >
				<tr>
					<td>Email Address</td>
					<td align="left"><input type="text" name="email" size="20"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td align="left"><input type="password" name="pass" size="20"></td>
				</tr>
 </td></tr></table>
 <p><input type="submit" name="submit" value="Login" /></p>
</form>

<?php 
include ('path/footer.html');
?>

