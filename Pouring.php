<?php 
include('header.php');
include('includes/config.php');
session_start();
?>
<?php
			if(isset($_POST['Update']))
            {
                $updateorder = $_POST['updateorder'];
                $sql = "UPDATE mana_Line_tbl SET `impression_Pouring` =CURRENT_TIMESTAMP,`mpression_Pouring_Status`=1 WHERE `order_Number`='$updateorder'"; 
                
                $query = $dbh->prepare($sql);
                $query -> execute();
                
               $count=$query->rowCount();

                if($count == 1){
                echo "<script type='text/javascript'>
                alert('records UPDATED successfully');
                </script>";
                }
                else{header("Location:Pouring.php");}
                    
                	
                 }

                
                    

                                            

                
			
		?>


<title>Digital Beauty Dental Lab || Pouring Step</title>
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
	<h2>Pouring Step </h2>	

    
    
    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pouring Cases Updater 
                        </div>
                        <div class="panel-body">
    
    <form method="post">
                    <div class="col-md-3">
							<label>Order Number</label>
                            
							<input type="text" name="updateorder" class="form-control" maxlength="5"
                            pattern="[0-9]{5}" 
                            title="Five Numbers Only" autocomplete="off" required autofocus >
                    </div>
                    <div class="col-md-3">
							<label>Order Number</label><br>
                        <input type="submit" name="Update" class="btn btn-success form-control" value="Update Order"> 
                            <br> 
                    </div>
         
       </form>
        </div></div>
        
    <html>
    <p id='bi'></p>
    </html>
    
    <div class="col-md-12">
     <div class="row">
                
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Pouring Cases List 
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
                                            <th>Time from Rec</th>
                                            <th>Pouring Time Finsh</th>
                                            <th>Status</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
 <?php 
    
    $sql = "SELECT order_tbl.order_Id, order_tbl.order_Number, mana_Line_tbl.order_Received,mana_Line_tbl.mpression_Pouring_Status,mana_Line_tbl.impression_Pouring,TIMEDIFF(mana_Line_tbl.order_Received, CURRENT_TIMESTAMP) AS 'sd' FROM `mana_Line_tbl` JOIN order_tbl on order_tbl.order_Number=mana_Line_tbl.order_Number WHERE mana_Line_tbl.`mpression_Pouring_Status` = 0 ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->order_Id);?></td>
                                            <td class="center"><?php echo htmlentities($result->order_Number);?></td>
                                            <td class="center"><?php echo htmlentities($result->order_Received);?></td>
                                            <td class="center"><?php echo htmlentities($result->sd);?></td>
                                            <td class="center"><?php echo htmlentities($result->impression_Pouring);?></td>
                                            
                                            
                                            
                                            
                                            <td class="center"><?php if($result->mpression_Pouring_Status=='0') {?>
                                            <a href="#" class="btn btn-warning btn-xs">Pending</a>
                                            </td>
                                            <?php } elseif($result->mpression_Pouring_Status=='1') {?>
                                            <a href="#" class="btn btn-danger btn-xs">Done</a>
                                            <?php } ?>
                                            
                                            
                                            
                                            
                                            
                                            
                                        <!--      <td class="center"><?php echo htmlentities($result->ConditionRate);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookPrice);?></td>
                                            <td class="center"><?php echo htmlentities($result->Description);?></td>
                                            
                                            <td class="center"><?php if($result->com=='1') {?>
                                            <a href="#" class="btn btn-success btn-xs">Available</a>
                                                
                                            <?php } elseif($result->com=='2') {?>
                                            <a href="#" class="btn btn-warning btn-xs">Sold</a>
                                                
                                            <?php } else {?>
                                            <a href="#" class="btn btn-danger btn-xs">Pending</a>
                                            <?php } ?>
                                                
                                                -->
                                                
                                                
                                                
                                                
                            
                                           

                                            
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
