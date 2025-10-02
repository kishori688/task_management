<?php 

function insert_task($conn, $data){
	$sql = "INSERT INTO tasks (title, description, status) VALUES(?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}

function get_all_tasks($conn){
	$sql = "SELECT * FROM tasks ORDER BY id DESC";
	$stmt = $conn->prepare($sql);
	$stmt->execute([]);

	if($stmt->rowCount() > 0){
		$tasks = $stmt->fetchAll();
	}else $tasks = 0;

	return $tasks;
}


function delete_task($conn, $data){
	$sql = "DELETE FROM tasks WHERE id=? ";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}


function get_task_by_id($conn, $id){
	$sql = "SELECT * FROM tasks WHERE id =? ";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);

	if($stmt->rowCount() > 0){
		$task = $stmt->fetch();
	}else $task = 0;

	return $task;
}
function count_tasks($conn){
	$sql = "SELECT id FROM tasks";
	$stmt = $conn->prepare($sql);
	$stmt->execute([]);

	return $stmt->rowCount();
}

function update_task($conn, $data){
	$sql = "UPDATE tasks SET title=?, description=?, status=? WHERE id=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}

function update_task_status($conn, $data){
	$sql = "UPDATE tasks SET status=? WHERE id=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}

