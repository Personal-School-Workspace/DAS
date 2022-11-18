<?php
$page_title = 'Patient Info';
include('path/header.html');
require_once ('./mysqli_connect.php');
?>
  <main> 
      <img src="images/Hospital.png" width="250" height="355" id="floatright" alt="Icecream">
    <?php
    

    $q = 'Select patient_id,f_name,m_initial,l_name,age,height,gender,medications,allergies,conditions from patients where Signed_Waiver = 1'; 
    $m = 'Select any patients name to view advanced details';
    echo $m;
    
	$r = @mysqli_query ($dbc, $q);
	echo '<table align="center" border="1">';
	$count=0;
	
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		if($count==0)
			echo '<tr>';
		$count=(++$count)%3;
		
            echo '<td align="left"><a href="details.php?pid=' . $row['patient_id'].'"> ' . $row['f_name'] . '</a></td></br>
            <td align="left"><a href="details.php?pid=' . $row['patient_id'].'"> ' . $row['m_initial'] . '</a></td></br>
            <td align="left"><a href="details.php?pid=' . $row['patient_id'].'"> ' . $row['l_name'] . '</a></td></br>';

        
        if($count==0)
			echo '</tr>';     
	}
	if($count!=0)
		echo '</tr>';
    echo '</table>'; 
	mysqli_free_result ($r);	
	

?>
  </main>
  <?php 
  include('path/footer.html');
  ?>