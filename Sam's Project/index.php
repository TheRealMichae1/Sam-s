<?php
include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
       include('connection.php');
       include('header.php');
?>
<head>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="index.php">Zambia Police</a>
            </div>
     
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
<!-- logged in user information -->
<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>
				<?php endif ?>
			</div>
		</div
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         Police database
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


             <div class="col-lg-12">
                        <h2>List of Records</h2> 
                        <div class="input-group">
 <!-- <form method="post" action="search.php">
  <div class="form-outline">
    <input id="search-input" type="search" id="form1" class="form-control" />
    <label class="form-label" for="form1"></label>
  </div>

  
  <button id="search-button" type="button" class="btn btn-primary">
    <i class="fas fa-search">Search</i>
  </button>
  </form> -->
  <?php

// Handle form submission
if (isset($_POST['submit'])) {
    // Get serial number entered by user
    $serialNumber = $_POST['serial_number'];

    // Query database to find device with serial number
    $db = new mysqli('localhost', 'username', 'password', 'database_name');
    $query = "SELECT * FROM devices WHERE serial_number = '$serialNumber'";
    $result = $db->query($query);

    // If device is found, send email
    if ($result->num_rows > 0) {
        $device = $result->fetch_assoc();
        $to = $device['email'];
        $subject = 'Your device has been found';
        $message = 'Your device has been found. Please contact us to retrieve it.';
        $headers = 'From: njolomba3@gmail.com' . "\r\n" .
            'Reply-To: yourname@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo 'An email has been sent to the owner of the device.';
        } else {
            echo 'Failed to send email.';
        }
    } else {
        echo 'Device not found.';
    }

    // Close database connection
    $db->close();
}

?>

<!-- Search form -->
<form method="get" action="search.php">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="q">
        <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
    </div>
</form>

    <form action="generate_report.php" method="post">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date">
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date">
    <input type="submit" value="Generate Report">
</form>



</div>
<br>
<br>   
                        <a href="add.php?action=add" type="button" class="btn btn-xs btn-info">Add New</a>
                            
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Las Name</th>
                                        <th>Middle Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>device Type</th>
                                        <th>Desciption</th>
                                        <th>Serial Number</th>
                                        <th>date</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php                  
                $query = 'SELECT * FROM people';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['first_name'].'</td>';
                            echo '<td>'. $row['last_name'].'</td>';
                            echo '<td>'. $row['mid_name'].'</td>';
                            echo '<td>'. $row['address'].'</td>';
                            echo '<td>'. $row['email'].'</td>';
                            echo '<td>'. $row['contact'].'</td>';
                            echo '<td>'. $row['device_type'].'</td>';
                            echo '<td>'. $row['comment'].'</td>';
                            echo '<td>'. $row['serial_number'].'</td>';
                            echo '<td>'. $row['date'].'</td>';

                            echo '<td> <a type="button" class="btn btn-xs btn-info" href="searchfrm.php?action=search & id='.$row['people_id'] . '" > View </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-warning" href="edit.php?action=edit & id='.$row['people_id'] . '"> EDIT </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-danger" href="del.php?type=people&delete & id=' . $row['people_id'] . '">DELETE </a> </td>';
                            echo '</tr> ';
                }
            ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--  JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
