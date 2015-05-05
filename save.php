<?php
include('connection.php');
$error = array();
$data = array();

$task_completed =mysql_real_escape_string($_POST['task_completed']);
$task_pending = mysql_real_escape_string($_POST['task_pending']);
$task_assigned = mysql_real_escape_string($_POST['task_assigned']);

$sql = "INSERT into dsr_data(email_id, task_completed, task_pending, task_assigned) values('$email_id', '$task_completed', '$task_pending', '$task_assigned')";

if(mysql_query($sql, $connection)){
	$data['success'] = true;

}
else{
	$data['success'] = false;
}
echo json_encode($data);
?>