<?php session_start();
//DB conncetion
include_once('includes/config.php');
error_reporting(0);
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


//Code for Assign to
if (isset($_POST['submit'])) {
$testid=intval($_GET['tid']);    
$ato=$_POST['assignto']; 
$assignto=explode("-",$ato);
$aname=$assignto[0];
$pid=$assignto[1];
$status='Assigned';
$assigntime = date( 'd-m-Y h:i:s A', time ());
$query=mysqli_query($con,"update tbltestrecord set ReportStatus='$status',AssigntoName='$aname',AssignedtoEmpId='$pid',AssignedTime='$assigntime' where id='$testid'");
echo '<script>alert("Effectué avec succés")</script>';
echo "<script>window.location.href='assigned-test.php'</script>";
    }

//Code for Take Action
if (isset($_POST['takeaction'])) {
$orderid=intval($_GET['oid']);    
$status=$_POST['status'];
$remark=$_POST['remark'];
$rby=$_SESSION['aid'];
//For delivered Status
if($status=='Delivered'):
$uploadtime = date( 'd-m-Y h:i:s A', time ());
//For checking the image type
$reportfile=$_FILES["report"]["name"];
// get the image extension
$extension = substr($reportfile,strlen($reportfile)-4,strlen($reportfile));
// allowed extensions
$allowed_extensions = array(".doc",".pdf",".PDF" ,".png" ,".PNG" ,".JPG" ,".jpg" );
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Le format de fichier n'est pas valide pour le téléchargement');</script>";
}
else
{
//rename the image file
$newreportfile=md5($reportfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["report"]["tmp_name"],"reportfiles/".$newreportfile);
$query=mysqli_query($con,"insert into tblreporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
$query2=mysqli_query($con,"update tbltestrecord set ReportStatus='$status',FinalReport='$newreportfile',ReportUploadTime='$uploadtime' where OrderNumber='$orderid'");
echo '<script>alert("Efféctué avec succés")</script>';
echo "<script>window.location.href='all-test.php'</script>";
}

// For other status
else:
$query=mysqli_query($con,"insert into tblreporttracking(OrderNumber,Status,Remark,RemarkBy) values('$orderid','$status','$remark','$rby')");
$query2=mysqli_query($con,"update tbltestrecord set ReportStatus='$status' where OrderNumber='$orderid'");
echo '<script>alert("Efféctué avec succés")</script>';
echo "<script>window.location.href='all-test.php'</script>";
endif;  

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rapports des tests</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
label{
    font-size:16px;
    font-weight:bold;
    color:#000;
}

</style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php include_once('includes/sidebar.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
          <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Détails du test <?php echo intval($_GET['oid']);?></h1>
<div class="row">
<?php 
$testid=intval($_GET['tid']);
$query=mysqli_query($con,"select * from tbltestrecord
join tblpatients on tblpatients.MobileNumber=tbltestrecord.PatientMobileNumber
where  tbltestrecord.id='$testid'");
while($row=mysqli_fetch_array($query)){ 
    ?>
<!-- personal information --->
                        <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Information personnel</h6>
                                </div>
                                <div class="card-body">
   
 <table class="table table-bordered"  width="100%" cellspacing="0">
    <tr>
    <th>Nom & prénom</th> 
    <td><?php echo $row['FullName'];?></td>
    </tr>

     <tr>
    <th>Numéro de téléphone</th> 
    <td><?php echo $row['MobileNumber'];?></td>
    </tr>

     <tr>
    <th> Date de naissance</th> 
    <td><?php echo $row['DateOfBirth'];?></td>
    </tr>


     <tr>
    <th> Preuve personnelle</th> 
    <td><?php echo $row['GovtIssuedId'];?></td>
    </tr>


     <tr>
    <th>Numéro d'identification national</th> 
    <td><?php echo $row['GovtIssuedIdNo'];?></td>
    </tr>


     <tr>
    <th>Adresse</th> 
    <td><?php echo $row['FullAddress'];?></td>
    </tr>

    <tr>
    <th>Ville</th> 
    <td><?php echo $row['State'];?></td>
    </tr>

    <tr>
    <th> Date de création</th> 
    <td><?php echo $row['RegistrationDate'];?></td>
    </tr>
 </table>

        
                                    
                                </div>
                            </div>
                        </div>

<!-- Test Information --->
                         <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Informations de test</h6>
                                </div>
                                <div class="card-body">

 <table class="table table-bordered"  width="100%" cellspacing="0">
    <tr>
    <th>Numéro de test</th> 
    <td><?php echo $row['OrderNumber'];?></td>
    </tr>

    <tr>
    <th> Type de test</th> 
    <td><?php echo $row['TestType'];?></td>
    </tr>


    <tr>
    <th>Date de test</th> 
    <td><?php echo $row['TestTimeSlot'];?></td>
    </tr>

 <tr>
    <th>Etat de test </th> 
    <td><?php if($row['ReportStatus']==''):
              echo "Le test n'a pas encore été fait";
          else:
           echo $row['ReportStatus'];
          endif;

    ?></td>
    </tr>


<?php if($row['AssignedtoEmpId']!=''):?>
  <tr>
    <th>L'employé désigné pour effectuer le test</th> 
    <td><?php echo $row['AssigntoName'];?></td>
    </tr>

    <tr>
    <th>Date de test</th> 
    <td><?php echo $row['AssignedTime'];?></td>
    </tr>
<?php endif;?>
<?php if($row['FinalReport']!=''):?>
  <tr>
    <th>Rapport</th> 
    <td><a href="reportfiles/<?php echo $row['FinalReport'];?>" target="_blank"> Télécharger le rapport</a></td>
    </tr>

    <tr>
    <th>Date d'émission du rapport</th> 
    <td><?php echo $row['ReportUploadTime'];?></td>
    </tr>
<?php endif;?>

</table>
                        

<?php if($row['AssignedtoEmpId']==''): 
    ?>
        <div class="form-group">
      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#assignto">Assigner par</button>
            </div>                                        
<?php else: 
$rstatus=$row['ReportStatus'];
if($rstatus=='Assigned' || $rstatus=='On the Way for Collection' || $rstatus=='Sample Collected' || $rstatus=='Sent to Lab'):?>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#takeaction">Modifier </button>
<?php 
endif;
endif;?>    
                                </div>
                            </div>

                        </div>
                    </div>
                <?php } ?>


<!-- Test Tracking History --->
<?php
$orderid=intval($_GET['oid']);
$ret=mysqli_query($con,"select * from tblreporttracking
join tbladmin on tbladmin.ID=tblreporttracking.RemarkBy
where tblreporttracking.OrderNumber='$orderid'");
$num=mysqli_num_rows($ret);
?>

<div class="row">
                         <div class="col-lg-12">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" align="center">Dossier de suivi des cas de test</h6>
                                </div>
                                <div class="card-body">
<?php if($num>0){
?>
 <table class="table table-bordered"  width="100%" cellspacing="0">
<tr>
    <th>Remarque</th>
    <th>Etat</th>
    <th>Date d'ajout </th>
    <th> Ajouter par</th>
<?php while($result=mysqli_fetch_array($ret)){?>
</tr>
    <tr>
    <td><?php echo $result['Remark'];?></td> 
    <td><?php echo $result['Status'];?></td>
    <td><?php echo $result['PostingTime'];?></td>
    <td><?php echo $result['AdminName'];?></td>
    </tr>

<?php } // End while loop?>

</table>
         <?php
       //end if   
     } else { ?>    
<h4 align="center" style="color:red"> Il n'y a pas de nouvelles sur l'état du test </h4>
         <?php } ?>           


                                </div>
                            </div>

                        </div>
                    </div>

</form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include_once('includes/footer.php');?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
<?php include_once('includes/footer2.php');?>


<!-- Assign Modal -->
<div id="assignto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="left">Choisissez un employé à affecter pour passer le test</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
<form method="post">
          <p>  <select class="form-control" name="assignto" required="true">
            <option value="">Les employés</option>
            <?php $sql=mysqli_query($con,"select FullName,EmpID from tblphlebotomist");
            while ($result=mysqli_fetch_array($sql)) {
            ?>
            <option value="<?php echo $result['FullName']."-".$result['EmpID'];?>"><?php echo $result['FullName'];?>-(<?php echo $result['EmpID'];?>)</option>
        <?php } ?>
            </select></p>
            <p>
     <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit" value="Affecter">   </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>
  </form>
    </div>

  </div>
</div>



<!-- Take Action Modal -->
<div id="takeaction" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="left">Mise à jour du cas de test</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
<form method="post" enctype="multipart/form-data" >
          <p>  <select class="form-control" name="status" id="status" required="true">
            <option value="">Choisissez le cas de test</option>
  <?php 

  $query1=mysqli_query($con,"select ReportStatus from tbltestrecord where OrderNumber='$orderid'");
  while($result=mysqli_fetch_array($query1)):
$reportstatus=$result['ReportStatus'];
endwhile;
  ?>

<?php if($reportstatus=='Assigned'):?>
            <option value="On the Way for Collection"> Envoyer un employé </option>
            <option value="Sample Collected">Prendre un prélévement</option>
            <option value="Sent to Lab">  Evoyer au laboratoire</option>
            <option value="Delivered"> Prendre le résultat</option>
            <?php elseif($reportstatus=='On the Way for Collection'):?>
            <option value="Sample Collected">Prendre un prélévement </option>
            <option value="Sent to Lab"> Evoyer au laboratoire </option>
            <option value="Delivered"> Prendre le résultat</option>
            <?php elseif($reportstatus=='Sample Collected'):?>
             <option value="Sent to Lab"> Evoyer au laboratoire</option>
            <option value="Delivered">Prendre le résultat</option>
             <?php elseif($reportstatus=='Sent to Lab'):?>
             <option value="Delivered">Prendre le résultat</option>
         <?php endif;?>

            </select></p>
       <p id='reportfile'> Rapport <span style="color:red; font-size:12px;">(Télécharger le rapport )</span>    <input type="file" name="report" id="report"></p>
       <p>
<textarea name="remark" class="form-control" required="true" placeholder="Maximum 500 lettres" maxlength="500" rows="5"></textarea>  </p> 
  <p>
     <input type="submit" class="btn btn-primary btn-user btn-block" name="takeaction" id="submit" value="Modifier">   </p> 
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>
  </form>
    </div>

  </div>
</div>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<script type="text/javascript">

  //For report file
  $('#reportfile').hide();
  $(document).ready(function(){
  $('#status').change(function(){
  if($('#status').val()=='Delivered')
  {
  $('#reportfile').show();
  jQuery("#report").prop('required',true);  
  }
  else{
  $('#reportfile').hide();
  }
})}) 
</script>
</body>
</html>
<?php } ?>