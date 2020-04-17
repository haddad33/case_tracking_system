<?php 
include('header.php');
include('includes/config.php');
session_start();
?>
<?php
			if(isset($_POST['Create']))
            {
                $barcodeText = trim($_POST['barcodeText']);
                $upper_Right = $_POST['upper_Right'];
                $upper_Left = $_POST['upper_Left'];
                $lower_Right = $_POST['lower_Right'];
                $lower_Left = $_POST['lower_Left'];
                $client_Id = $_POST['client_Id'];
                $color_Id = $_POST['color_Id'];
                $type_Id = $_POST['type_Id'];
                $order_Note = $_POST['order_Note'];
                $Patient = $_POST['Patient'];
                $dremail = $_POST['dremail'];
                $datedue = $_POST['datedue'];
                $drmobile = $_POST['drmobile'];

                
                
                $sql = "INSERT INTO `order_tbl` 
                
                (`order_Id`, `order_Number`, `upper_Right`, `upper_Left`, `lower_Right`, `lower_Left`, `order_Note`, `order_Date_Creation`, `client_client_Id`, `type_type_Id`, `color_color_Id`,`Patient`,`datedue`) 
                
                VALUES 
                (NULL, '$barcodeText', '$upper_Right',
                '$upper_Left', '$lower_Right', '$lower_Left', 
                '$order_Note', CURRENT_TIMESTAMP, 
                '$client_Id', '$type_Id', '$color_Id','$Patient', '$datedue')";
                
                $query = $dbh->prepare($sql);
                $query -> execute();

                
                $mana=$dbh->lastInsertId();

                
                
                
                $sql2="INSERT INTO `mana_Line_tbl` 
                (`mana_Line_Id`, `order_Received`, `impression_Pouring`,`order_tbl_order_Id`, `order_Number`) 
                VALUES 
                (NULL, CURRENT_TIMESTAMP, NULL, '$mana','$barcodeText')";
                
                
                $query2 = $dbh->prepare($sql2);
                $query2 -> execute();

                
                
                
                $sql3=" UPDATE `client_tbl` SET `dremail`='$dremail',`drmobile`='$drmobile' WHERE `client_Id`=$client_Id";
                
                
                $query3 = $dbh->prepare($sql3);
                $query3 -> execute();
                
                
                
				$barcodeType='code128';
				$barcodeDisplay='horizontal';
				$barcodeSize='50';
				$printText='true';
                
                $_SESSION['barcodeText']=$barcodeText;
				$_SESSION['barcodeType']=$barcodeType;
				$_SESSION['barcodeDisplay']=$barcodeDisplay;
				$_SESSION['barcodeSize']=$barcodeSize;
				$_SESSION['printText']=$printText;
                
                
                
                
                header("Location:orderReport.php");	
			}
		?>


<title>Digital Beauty Dental Lab || Order Creater</title>
<style>
img.barcode {
    border: 1px solid #ccc;
    padding: 20px 10px;
    border-radius: 5px;
}
</style>
<?php include('container.php');?>
<div class="container">
	<h2>Order Creator </h2>	

    
    <form method="post">
        <div class="form-group">
        <div class="col-md-8">
            <div class="row">
                    <div class="col-md-4">
							<label>Order Number<span style="color:red;">*</span></label>
                        
<?php 
$sql = "SELECT MAX(`order_Number`) as 'max' FROM order_tbl  ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {
?>  

                            
							<input type="text" name="barcodeText" class="form-control" maxlength="5"
                            pattern="[0-9]{5}" 
                            title="Five Numbers Only" autocomplete="off" required value="<?php echo htmlentities($result->max+1); }}?>" readonly autofocus>
                            <br> 
                    </div>
                    
                    
                    <div class="col-md-4">
                        
                        <div class="form-group">
                            <label> Client Name<span style="color:red;">*</span></label>
                            <select class="form-control" name="client_Id" onchange="myFunction(event)" required >
                                <option value="" > Select</option>
                                    <?php 

                                $sql = "SELECT * from  client_tbl ";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                    foreach($results as $result)
                                    {               ?>  
                                <option id='clientName' name="<?php echo htmlentities($result->client_Complex);?>" value="<?php echo htmlentities($result->client_Id);?>"  ><?php echo htmlentities($result->client_Name);?></option>
                                <?php }} ?> 

                                </select>
       
                        </div>
                    </div>                                       
                    
                <script>
                    function myFunction(e) 
                    {
                        
                    document.getElementById("Complex").value =
                        
                    e.target.selectedOptions[0].getAttribute('name');
                    }
                
                
                </script>
                    <div class="col-md-4">
                        
                         <label>Complex Name<span style="color:red;">*</span></label>

                        <input type="text" id="Complex" readonly class="form-control"  >
                        
                        </div>
                
                
            </div>
            
            
            
            
            
            
            
            <div class="row">
                
            <div class="col-md-4">
            <div class="form-group">               
                <label>Dentist Mobile Number<span style="color:red;">*</span> 
                </label>
                
                <input type="text" name="drmobile" class="form-control" maxlength="10" pattern="[0-9]{10}" 
                title="valid mobile number 05xxxxxxxxx" 
                autocomplete="off" required >
            </div>
            </div>
                
                
            <div class="col-md-4">
            <div class="form-group">               
                <label>Dentist Email
                </label>
                
                <input type="email" name="dremail" class="form-control" 
                autocomplete="off" >
                <p class="help-block">*Notification email will send </p>
            </div>
            </div>
            
            
            <div class="col-md-4">
            <div class="form-group">               
                <label>Patient Name <span style="color:red;">*</span>
                </label>
                
                <input type="text" name="Patient" class="form-control" 
                autocomplete="off" >
                
            </div>
            </div>

        </div>
            
            
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
                <label> Type:<span style="color:red;">*</span></label>
                <input type="text" class="form-control" list="type" name="type_Id" autocomplete="off" required>
                <datalist id="type" >
                    <?php 
                        $sql = "SELECT * from  type_tbl ";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {
                    ?>  
                <option id='type_Id' value="<?php echo htmlentities($result->type_Id);?>"><?php echo htmlentities($result->type_Name);?></option>
                                                <?php }} ?> 
                </datalist>    
            </div>
            </div>

                
            <div class="col-md-4">
                <label> Case Color:<span style="color:red;">*</span></label>
                <input type="text" class="form-control" list="Color" name="color_Id" autocomplete="off" required>
                <datalist id="Color">
                    <?php 
                        $sql = "SELECT * from  color_tbl ";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {
                    ?>  
                    <option id='color_Id' value="<?php echo htmlentities($result->color_Id);?>"><?php echo htmlentities($result->color_Name);?></option>
                    <?php }} ?> 
                </datalist>                 
                </div>
                
              
                
            
            <div class="col-md-4">
            <div class="form-group">
                <label> Due date:<span style="color:red;">* Min 4 days from now</span>
                </label>
                <input type="date" id="datedue" name="datedue" min=''class="form-control"required >
                    <script>
                        function addDays() 
                        {
                        var result = new Date();
                        result.setDate(result.getDate() + 4);
                        var month = '' + (result.getMonth() + 1),
                        day = '' + result.getDate(),
                        year = result.getFullYear();
                        if (month.length < 2) 
                        month = '0' + month;
                        if (day.length < 2) 
                        day = '0' + day;
                        var da= [year, month, day].join('-');
                        return da;
                        } document.getElementById("datedue").setAttribute('min', addDays());

                        </script>
                </div>
                </div>
            </div>
            
            
            
            
            
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <br>
                <table border="1">
                        <th></th>
                        <th>Right </th>
                        <th>Left</th>
                        <tr>
                        <th> Upper</th>
                        <td>
                            <input type=text name='upper_Right' class="form-control">
                        </td>    
                        <td>
                            <input type=text name='upper_Left' class="form-control">
                        </td>
                        </tr>
                        <tr>
                            <th>&nbsp;Lower &nbsp;</th>
                        <td>
                            <input type=text name="lower_Right" class="form-control">
                        </td>
                        <td>
                            <input type=text name="lower_Left" class="form-control">
                            </td>
                        </tr>
                        
                     </table>
                </div>
            </div>
            
            
            <div class="row">
            <div class="col-md-4">
                
             <br>
                <strong>Note:</strong>
                <br>
                
            <textarea name="order_Note" value="" cols="100" rows="3"></textarea>
                
                </div>
                </div>
            
            <input type="submit" name="Create" class="btn btn-success form-control" value="Create Order">
            </div>
        </div>            
			</form>
        
        
        
		 
        
</div>

	
<?php include('footer.php');?>