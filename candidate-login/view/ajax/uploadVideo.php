<? date_default_timezone_set('Asia/Kolkata');
include('../../../config/config.php');
include('../../../config/function.php');
ini_set('error_reporting', E_ALL);
function saveOnserver($fileName,$filePath){
if (!class_exists('../../../amazon-s3/S3')) require_once '../../../amazon-s3/S3.php';

// AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIA5YY6SMZU6IP7YN22');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');

//$uploadFile = dirname(__FILE__).'/mic-on.jpg'; // File to upload, we'll use the
$uploadFile = $filePath; // S3 class since it exists
//$bucketName = uniqid('record-rtc-videos');
$bucketName = 'jobportal-candidate-video';// Temporary bucket
$s3 = new S3(awsAccessKey, awsSecretKey);
    if ($s3->putObjectFile($uploadFile, $bucketName, baseName($uploadFile), S3::ACL_PUBLIC_READ)) {
        unlink( $uploadFile );
    		return;
    		
    }
}

if (!empty($_FILES['video_filename']["name"])) {
    $master_id=$_REQUEST['can_id'];
    $file_idx='video_filename';
    $rand=rand();
    $video_filename = $_FILES['video_filename']["name"];
    $explode=explode('.',$video_filename);
    $exp1=$explode[0];
    $exp2=$explode[1];
    $fileName=$exp1.'_'.$rand.'.'.$exp2;
    //echo $fileName;
    $tempName = $_FILES[$file_idx]['tmp_name'];
    $filePath = '../../../upload_video/'.$fileName;
    
     // make sure that one can upload only allowed audio/video files
    $allowed = array(
        'webm',
        'wav',
        'mp4',
        'mkv',
        'mp3',
        'ogg'
    );
    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
    if (!$extension || empty($extension) || !in_array($extension, $allowed)) {
        echo 'Invalid file extension: '.$extension;
        return;
    }elseif (move_uploaded_file($tempName, $filePath)) {
        saveOnserver($fileName,$filePath);
        $dateTime=date('Y-m-d h:i:s');
        $query="INSERT INTO `candidate_video` (`master_id`,`videoName`,`uploadDate`,`status`) VALUES ('$master_id','$fileName','$dateTime','0')";
        mysql_query($query);
        echo "Video Upload Sucessfully";
        return;
    }else{
        echo "Video Upload Fail";
        return;
    }
} else {
    echo "Fail";
    return;
}

?>