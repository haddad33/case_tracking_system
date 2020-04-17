</head>
<body class="">
<div role="navigation" class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="http://www.google.com" class="navbar-brand">D Lab</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[1]; if($page == "index.php") { echo "'active'";} else { echo "''"; } ?>''>
                <a href="index.php">Order Creator</a></li>
              
            <li class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[1]; if($page == "Pouring.php") { echo "'active'";} else { echo "''"; } ?>''>
                <a href="Pouring.php">Pouring Step </a></li>
              
            <li class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[1]; if($page == "Designing.php") { echo "'active'";} else { echo "''"; } ?>''>
                <a href="Designing.php">Designing Step </a></li>
              
            <li class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[1]; if($page == "Milling.php") { echo "'active'";} else { echo "''"; } ?>''>
                <a href="Milling.php">Milling Step
                </a></li>
              
            <li class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[1]; if($page == "Frilling.php") { echo "'active'";} else { echo "''"; } ?>''>
                <a href="Frilling.php">Frilling Step
                </a></li>
              
             <li class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[1]; if($page == "Finshing.php") { echo "'active'";} else { echo "''"; } ?>''>
                 <a href="Finshing.php">Finshing Step
                </a></li>
              
               <li class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[1]; if($page == "Delivered.php") { echo "'active'";} else { echo "''"; } ?>''>
                   <a href="Delivered.php">Delivered Step
                </a></li>
              
              <li class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[1]; if($page == "Check_Status.php") { echo "'active'";} else { echo "''"; } ?>''>
                  <a href="Check_Status.php">Check Status
                </a></li>
              
             <li class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[1]; if($page == "emailnot.php") { echo "'active'";} else { echo "''"; } ?>''>
                  <a href="emailnot.php">Email sender
                </a></li>
              
              
              
              
              
              
              
              
          </ul>
         
        </div><!--/.nav-collapse -->
          
          <li>
            
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="mailto:supportEmail.com">Support</a>		

           </li>   
      </div>
    </div>
	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>