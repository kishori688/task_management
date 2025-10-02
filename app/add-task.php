<?php 
session_start();


if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['status'])) {
	include "../db_conn.php";

    function validate_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$title = validate_input($_POST['title']);
	$description = validate_input($_POST['description']);

	$status = validate_input($_POST['status']);

	if (empty($title)) {
		$em = "Title is required";
	    header("Location: ../create_task.php?error=$em");
	    exit();
	}else if (empty($description)) {
		$em = "Description is required";
	    header("Location: ../create_task.php?error=$em");
	    exit();
	}else if (empty($status)) {
		$em = "Select Status";
	    header("Location: ../create_task.php?error=$em");
	    exit();
	}else {
    
       include "Model/Task.php";
       $data = array($title, $description, $status);
       insert_task($conn, $data);



       $em = "Task created successfully";
	    header("Location: ../create_task.php?success=$em");
	    exit();

    
	}
}else {
   $em = "Unknown error occurred";
   header("Location: ../create_task.php?error=$em");
   exit();
}

//else{ 
//   $em = "First login";
//   header("Location: ../create_task.php?error=$em");
//   exit();
//}