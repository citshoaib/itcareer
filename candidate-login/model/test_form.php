<?php 
@session_start();
include("../../config/config.php");
include("../../config/function.php");

//$name = json_decode('[{"type":"file","id":"306418117902","etag":"0","name":"703139473__.pdf"},{"type":"file","id":"306422956910","etag":"0","name":"91633533__.docx"},{"type":"file","id":"306406124855","etag":"0","name":"README.md"},{"type":"file","id":"306408880379","etag":"0","name":"SampleVideo_1280x720_1mb.mp4"},{"type":"file","id":"306411815361","etag":"0","name":"Screencast 2018-07-21 15:11:42.mp4"}]');
$myJSON = $_REQUEST['name'];
$CandidateId = base64_decode($_REQUEST['CandidateId']);
$FileName = $_REQUEST['FileName'];
$FileUrl = $_REQUEST['FileUrl'];

mysql_query("UPDATE sedna_user_registration_tbl SET
            video_id ='$myJSON',
            file_name ='$FileName',
            file_url = '$FileUrl'
            where master_id='$CandidateId'") or die(mysql_error());
   
    $array[] = array(
        "candidate_id" => $CandidateId,
        "fileName" => $FileName,
        "fileId" => $myJSON,
        "FileUrl" => $FileUrl
        );
    



$namemyJSON = json_encode($array);

echo $namemyJSON;
    

?>