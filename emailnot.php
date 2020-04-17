<?php
include('header.php');
include('includes/config.php');
include('contact/vendor/autoload.php');
include('contact/config.php');


session_start();


if (!empty($_SESSION['_contact_form_error'])) {
    $error = $_SESSION['_contact_form_error'];
    unset($_SESSION['_contact_form_error']);
}

if (!empty($_SESSION['_contact_form_success'])) {
    $success = true;
    unset($_SESSION['_contact_form_success']);
}

//error_reporting(0);

?>
<?php

if(isset($_POST['Ordernumber']))
{
//code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else { 
                $updateorder = $_POST['updateorder'];
            
        }
                	
                 }

                
                    

                                            

                
			
		?>


<title>Digital Beauty Dental Lab || Order Status Checker</title>
<!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<?php include('container.php');?>
<div class="container">
	<h2>Order Status Checker </h2>	
	<br>
    <?php
                    if (!empty($success)) {
                        ?>
                        <div class="alert alert-success">Your message was sent successfully!</div>
                        <?php
                    }
                    ?>

                    <?php
                    if (!empty($error)) {
                        ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                        <?php
                    }
                    ?>
    
    
    
        
    <html>
    <p id='bi'></p>
    </html>
    
    <div class="col-md-12">
     <div class="row">
                
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Order Status  
                        </div>
                        <div class="panel-body">
                            
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Order Number</th>
                                            <th>Case Recieved</th>
                                            <th>Pouring</th>
                                            <th>Designing</th>
                                            <th>Milling</th>
                                            <th>Frilling</th>
                                            <th>Finshing</th>
                                            <th>Delivered</th>
                                            <th>Send Notification</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
 <?php 
    
    $sql = "SELECT * from  mana_Line_tbl where order_Finshing_Status ='1'  ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{     
    
    
    
    
   $xxx=htmlentities($result->order_tbl_order_Id); 
    echo $xxx+1;
                                        
                                        
                                        
                                        
                                        ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->order_tbl_order_Id);?></td>
                                            <td class="center"><?php echo htmlentities($result->order_Number);?></td>
                                            <td class="center"><?php echo htmlentities($result->order_Received);?></td>
                                            
                                            
                                            <td class="center"><?php if($result->mpression_Pouring_Status=='0') {?>
                                            <a href="#" class="btn btn-warning btn-xs">Pending</a>
                                            </td>
                                            <?php } elseif($result->mpression_Pouring_Status=='1') {?>
                                            <a href="#" class="btn btn-success btn-xs">Done</a>
                                            <?php } ?>
                                            
                                            
                                            
                                            <td class="center"><?php if($result->order_Designing_Status=='0') {?>
                                            <a href="#" class="btn btn-warning btn-xs">Pending</a>
                                            </td>
                                            <?php } elseif($result->order_Designing_Status=='1') {?>
                                            <a href="#" class="btn btn-success btn-xs">Done</a>
                                            <?php } ?>
                                            
                                            
                                            <td class="center"><?php if($result->order_Milling_Status=='0') {?>
                                            <a href="#" class="btn btn-warning btn-xs">Pending</a>
                                            </td>
                                            <?php } elseif($result->order_Milling_Status=='1') {?>
                                            <a href="#" class="btn btn-success btn-xs">Done</a>
                                            <?php } ?>
                                            
                                            
                                            <td class="center"><?php if($result->order_Frilling_Status=='0') {?>
                                            <a href="#" class="btn btn-warning btn-xs">Pending</a>
                                            </td>
                                            <?php } elseif($result->order_Frilling_Status=='1') {?>
                                            <a href="#" class="btn btn-success btn-xs">Done</a>
                                            <?php } ?>
                                            
                                            
                                            
                                            <td class="center"><?php if($result->order_Finshing_Status=='0') {?>
                                            <a href="#" class="btn btn-warning btn-xs">Pending</a>
                                            </td>
                                            <?php } elseif($result->order_Finshing_Status=='1') {?>
                                            <a href="#" class="btn btn-success btn-xs">Done</a>
                                            <?php } ?>
                                            
                                            
                                            
                                            <td class="center"><?php if($result->order_Delivered_Status=='0') {?>
                                            <a href="#" class="btn btn-warning btn-xs">Pending</a>
                                            </td>
                                            <?php } elseif($result->order_Delivered_Status=='1') {?>
                                            <a href="#" class="btn btn-success btn-xs">Done</a>
                                            <?php } ?>
                                            
                                            <td class="center">  
                                                <a href="contact/submit.php?Ordernumber=<?php echo htmlentities($result->order_tbl_order_Id);?>" onclick="return confirm('Send Notification email');" >  <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> send email</button>
                                                </a>
                                            
                                            
                                            
                                            
                                                
                                                
                                                
                            
                                           

                                            
                                        </tr>
                                        <?php $cnt=$cnt+1;}} ?>  
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!--End Advanced Tables -->
    </div>
    </div></div>
    
        
        
		 
        



<?php include('footer.php');?>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
