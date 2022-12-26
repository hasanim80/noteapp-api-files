<?php 
include "../connect.php";
$title = filterRequest("title"); // This string will be used in flutter
$content = filterRequest("content");
$userid = filterRequest("id");

$stmt = $con->prepare(
    "INSERT INTO `notes`(`notes_title`,`notes_content`,`notes_users`,`notes_status`) VALUES (?,?,?,1)
    ");

    $stmt->execute(array($title,$content,$userid));

    $count = $stmt->rowCount();
    if($count>0){
        echo json_encode(array("status"=>"success"));
    }
    else{
        echo json_encode(array("status"=>"fail"));
    }
?>