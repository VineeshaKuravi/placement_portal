<?php


//To Handle Session Variables on This Page
//session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if (empty($_SESSION['id_company'])) {
    header("Location: ../index.php");
    exit();
}
require_once("../db.php");

$sql = "select * from users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {


        //the subject
        $sub = "NECN Placements - New Drive has been posted.";
        //the message
        $msg = "A new drive has been posted by the respective coordinators. Go to the website https://necn-placement.000webhostapp.com/. Login to your profile to check your eligibility and apply for the drive.";
        //recipient email here
        $str = $row['email'];
        $rec = "$str";
        //send email
        mail($rec, $sub, $msg);
    }
}
