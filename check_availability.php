<?php 
require_once("includes/config.php");
// Check Availabilty for user mobile number
if(!empty($_POST["mobnumber"])) {
	$mnumber= $_POST["mobnumber"];

		$result =mysqli_query($con,"select id from tblpatients where MobileNumber='$mnumber'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Le numéro existe déjà. Veuillez essayer avec un autre numéro de mobile ou cliquez sur  <a href='registered-user-testing.php'> Nouveau Rendez-vous </span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'>Le numéro de téléphone est disponible pour l'inscription</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


// Check Availabilty for Phlebotomist employee id
if(!empty($_POST["employeeid"])) {
	$empid= $_POST["employeeid"];

		$result =mysqli_query($con,"select id from tblphlebotomist where EmpID='$empid'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>Le numéro d'employé existe déjà. Veuillez essayer avec un autre identifiant d'employé.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Le numéro d'employé est disponible pour l'inscription .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
