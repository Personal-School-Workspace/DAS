<?php 
session_start();
if (!isset($_SESSION['admin_id'])) {

	require_once ('./login_functions.inc.php');
	$url = absolute_url();
	header("Location: $url");
	exit(); 
	
} else { 
    $_SESSION=array();
    session_destroy();
}

$page_title = 'Logged Out!';
include ('path/header.html');

echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";

include ('path/footer.html');
?>
