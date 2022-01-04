<?php 
//DB conncetion
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['submit'])){
//getting post values
$mnumber=$_POST['mobilenumber'];
$testtype=$_POST['testtype'];
$timeslot=$_POST['birthdaytime'];
$orderno= mt_rand(100000000, 999999999);
$query="insert into tbltestrecord(PatientMobileNumber,TestType,TestTimeSlot,OrderNumber) values('$mnumber','$testtype','$timeslot','$orderno');";
$result = mysqli_query($con, $query);
if ($result) {
echo '<script>alert("Votre réservation de test a été soumise avec succès. Veuillez conserver votre numéro de demande. Le numéro est : "+"'.$orderno.'")</script>';
  echo "<script>window.location.href='registered-user-testing.php'</script>";
} 
else {
    echo "<script>alert('Il y'a une erreur essayer une autre fois.');</script>";  
echo "<script>window.location.href='registered-user-testing.php'</script>";
}
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

    <title>  Prendre un dexième rendez-vous</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Si vous avez déjà pris rendez-vous et souhaitez prendre un nouveau rendez-vous </h1>
                    <p> Tapez simplement votre numéro de téléphone que vous avez enregistré précédemment </p>

<form method="post">
  <div class="row">

                        <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                          
                                <div class="card-body">
                       <div class="form-group">
                                             <label>Numéro de téléphone enregistré</label>
                                            <input type="text" class="form-control" id="regmobilenumber" name="regmobilenumber" placeholder="Entrez le numéro de téléphone pré-enregistré " pattern="[0-9]{11}" title="Maximum 11 numéros" required="true" maxlength="11">
                                        </div>
<div class="form-group">
                                 <input type="submit" class="btn btn-primary btn-user btn-block" name="search" value="Search">                           
                             </div>

                                    </div>
                                </div>
                            </div>
                        </div>
</form>

<hr />
<?php if(isset($_POST['search'])){ ?>
<h3 align="center" style="color:red">Résultats de recherche de numéro de téléphone: "<?php echo $_POST['regmobilenumber'];?>"</h3>
<hr />
    <?php
    $mnumber=intval($_POST['regmobilenumber']);
    $sql=mysqli_query($con,"select * from tblpatients where MobileNumber='$mnumber'");
    $row=mysqli_num_rows($sql);
    if($row>0){
    while ($result=mysqli_fetch_array($sql)) {

?>
<form name="newtesting" method="post">
  <div class="row">

                        <div class="col-lg-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Données personnelles du patient</h6>
                                </div>
                                <div class="card-body">
                        <div class="form-group">
                            <label> Nom & prénom</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname"  value="<?php echo $result['FullName']; ?>" readonly="true">
                                        </div>
                                        <div class="form-group">
                                             <label> Numéro du téléphone</label>
                                            <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php echo $result['MobileNumber']; ?>" readonly="true">
                                        </div>
                                        <div class="form-group">
                                             <label> Date de naissance (dd-mm-yyyy)</label>
                                            <input type="text" class="form-control" id="dob" name="dob" readonly="true" value="<?php echo $result['DateOfBirth']; ?>">
                                        </div>
                                        <div class="form-group">
                                               <label>La preuve personnelle que vous avez fournie</label>
                                            <input type="text" class="form-control" id="govtissuedid" name="govtissuedid" value="<?php echo $result['GovtIssuedId']; ?>" readonly="true">
                                        </div>
                                        <div class="form-group">
                                              <label>Numéro d'identification national</label>
                                            <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" value="<?php echo $result['GovtIssuedIdNo']; ?>" readonly="true">
                                        </div>
                          

                               <div class="form-group">
                                              <label>Adresse</label>
                                            <textarea class="form-control" id="address" name="address" readonly="true"><?php echo $result['FullAddress']; ?></textarea>
                                        </div>
 <div class="form-group">
                                              <label>Ville</label>
                                      <input type="text" class="form-control" id="state" name="state" value="<?php echo $result['State']; ?>" readonly="true">
                                        </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                           <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Nouvelles informations de réservation</h6>
                                </div>
                                <div class="card-body">
                             <div class="form-group">
                                              <label>Type du test</label>
                                              <select class="form-control" id="testtype" name="testtype" required="true">
                                            <option value=""> Choisir le type du test </option> 
                                            <option value="ANTIGEN">ANTIGEN</option>  
                                            <option value="PCR">PCR</option>   
                                            <option value="NAAT">NAAT</option> 
                                              </select>
                                        </div>

                                                      <div class="form-group">
                                            <label>Choisissez l'heure qui vous conviennent</label>
                                 <input type="datetime-local" class="form-control" id="birthdaytime" name="birthdaytime" class="form-control">                                        
                             </div>
                       <div class="form-group">
                                 <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Réserver">                           
                             </div>

                                </div>
                            </div>
                       

                        </div>

                    </div>
</form>
<?php } } else { ?>
<h4 align="center" style="color:red;">Ce numéro n'a pas été enregistré auparavant </h4>
<?php }}?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include_once('includes/footer.php');?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>