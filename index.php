<?php 
session_start();
if (isset($_SESSION['email']) && 
          isset($_SESSION['user_id'])) { 
     include "db_conn.php";
    include "app/Model/Task.php";
    //$num_task = count_tasks($conn);
    //print_r($num_task);
    $num_task = count_tasks($conn);
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task Management System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
            <section class="section-1">
		
				<div class="dashboard">
                                    
					<div class="dashboard-item">
						<i class="fa fa-tasks"></i>
                                                <span><?=$num_task?><br>   All Tasks</span></a>
					</div>
				</div>
         
		</section>
     
<!--     <a href="logout.php">Logout</a>-->
        </div>
</body>
</html>
<?php }else {
	$errorM = "Login First!";
	header("Location: login.php?error=$errorM");
} ?>