<?php 
include('header.php');
include('includes/config.php');

session_start();
?>
<?php
    
    $barcodeText= $_SESSION['barcodeText'];
echo 'Digital Beauty Dental Lab.';

    if($barcodeText  != '')
    {
 
    $sql = "SELECT * from  order_tbl join type_tbl on type_tbl.type_Id=order_tbl.type_type_Id join color_tbl on color_tbl.color_Id=order_tbl.color_color_Id JOIN client_tbl on client_tbl.client_Id=order_tbl.client_client_Id WHERE `order_Number`='$barcodeText'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)

foreach($results as $result)
{                 
                
    
    }}
?>


<html>
    
    <head>
        <title>
            <?php echo $barcodeText;?>
        </title>
        <style>
img.barcode {
    border: 1px solid #ccc;
    padding: 20px 10px;
    border-radius: 5px;
}
</style>
        <style type="text/css">

        .test-result-table {

            border: 1px solid black;
            width: 800px;
        }

        .test-result-table-header-cell {

            border-bottom: 1px solid black;
            background-color: silver;
        }

        .test-result-step-command-cell-coment {

            border-bottom: 1px solid gray;
            height: 50px
        }

        .test-result-step-description-cell {

            border-bottom: 1px solid gray;
        }

        .test-result-step-result-cell-ok {

            border-bottom: 1px solid gray;
            background-color: green;
        }

        .test-result-step-result-cell-failure {

            border-bottom: 1px solid gray;
            background-color: red;
        }

        .test-result-step-result-cell-notperformed {

            border-bottom: 1px solid gray;
            background-color: white;
        }

        .test-result-describe-cell {
            border-bottom: 1px solid gray;
            background-color: tan;
            font-style: italic;
            height: 70px;
        }

        .test-cast-status-box-ok {
            border: 1px solid black;
            float: left;
            margin-right: 10px;
            width: 45px;
            height: 25px;
            background-color: green;
        }

        </style>
    </head>
    <body>
        <table border="0" width=800px>
        <tr>
            <td align="center" width=200px><h1><?php echo $barcodeText;?><br></h1></td>
            <td align="center" width=200px><h1><?php echo htmlentities($result->color_Name); ?></h1></td>
            <td align="center" width=200px><h1><?php echo htmlentities($result->type_Name); ?></h1></td>
            <td align="center" width=200px><h1>
                <?php
                    $barcodeText= $_SESSION['barcodeText'];
				    $barcodeType=$_SESSION['barcodeType'];
				    $barcodeDisplay= $_SESSION['barcodeDisplay'];
				    $barcodeSize=$_SESSION['barcodeSize'];
				    $printText= $_SESSION['printText'];
				    if(  $barcodeText  != '') {
					echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>';}
                ?></h1></td>
            </tr>
            
            </table>
<!--
        <h1 class="test-results-header">
                        <?php echo $barcodeText;?> &nbsp;&nbsp;

            <?php
                    $barcodeText= $_SESSION['barcodeText'];
				    $barcodeType=$_SESSION['barcodeType'];
				    $barcodeDisplay= $_SESSION['barcodeDisplay'];
				    $barcodeSize=$_SESSION['barcodeSize'];
				    $printText= $_SESSION['printText'];
				    if(  $barcodeText  != '') {
					echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>';}
                    ?>
            &nbsp;&nbsp;
            
            <?php echo htmlentities($result->type_Name); ?>
            
            &nbsp;&nbsp;
            
            <?php echo htmlentities($result->color_Name); ?>

        </h1>
-->
        <table width=800px cellspacing="0">
            <thead>
                <tr>
                    <th class="test-result-table-header-cell">
                        Order Creation Date
                    </th>
                    <th class="test-result-table-header-cell">
                        Dr. Name
                    </th>
                    <th class="test-result-table-header-cell">
                        Clinic Name
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="test-result-step-row test-result-step-row-altone">
                    <td class="test-result-step-command-cell">
                        <?php echo htmlentities($result->order_Date_Creation); ?> 
                    </td>
                    <td class="test-result-step-description-cell">
                        <h4>Dr. <?php echo htmlentities($result->client_Name); ?></h4>
                    </td>
                    <!--<td class="test-result-step-result-cell-ok"> -->
                    <td class="test-result-step-description-cell">
                        <h4><?php echo htmlentities($result->client_Complex); ?></h4>
                    </td>
                </tr>
                <tr class="test-result-step-row test-result-comment-row">
                    <td class="test-result-describe-cell" colspan="3">
                        Describe:<br>
                        
                        Upper --> <?php echo htmlentities($result->upper_Left); ?>
                        |
                        
                        <?php echo htmlentities($result->upper_Right); ?>
                        <br>
                        Lower --> <?php echo htmlentities($result->lower_Right); ?>
                        |
                        
                        <?php echo htmlentities($result->lower_Left); ?>
                        
                    </td>
                </tr>
                <tr class="test-result-step-row test-result-step-row-alttwo">
                    <td class="test-result-step-command-cell" colspan="3">
                        Dr. Comment : <h5><?php echo htmlentities($result->order_Note); ?></h5>
                    </td>
                    
                </tr>
                <tr class="test-result-step-row test-result-step-row-altone">
                    <td class="test-result-step-command-cell" colspan="3">
                        Tech. Comments : write it here
                        <hr>
                        <hr>
                        <hr>
                    </td>
                    
                </tr>
                <tr>
                <td>
                    <a href="index.php" id="printpagebuttons" type="button"    accesskey="A" ><button>New order (Alt + A)</button></a></td>
                
                <td></td>
            
                <td align="right" >
                    <input id="printpagebutton" type="button" value="Print this page" onclick="printpage()" autofocus/>
                    <script type="text/javascript">
                        function printpage() {
                            //Get the print button and put it into a variable
                             var printButtons = document.getElementById("printpagebuttons");
                            printButtons.style.visibility = 'hidden';
                            
                            var printButton = document.getElementById("printpagebutton");
                            printButton.style.visibility = 'hidden';
                           
                            window.print()
                            printButton.style.visibility = 'visible';
                            $(document).ready(function() {history.go(-1); 
                                                          
                            //window.location.href = "http://example.com/new_url";

});
                                                }
                        
                        
                          
                        
                                    
                    </script>
                 
                    </td></tr>
            </tbody>
        </table>



    </body>
</html>