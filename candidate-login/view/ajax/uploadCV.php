<?
include('../../../config/config.php');
include('../../../config/function.php');

$reg_id=$_REQUEST['can_id'];
    if(!empty($_FILES['cv']["name"])){
		$random_id= rand();
		 $date_for_upload=strtotime(date("Y/m/d H:i:s"));
		$ext=explode(".",$_FILES["cv"]["name"]);
		$handle =$_FILES["cv"]["tmp_name"];
					//print_r($ext[1]); 
				 $real_upload_name_move="../../../upload_doc/" .$random_id.'__'.$date_for_upload.'.'.$ext[1];
				 $real_upload_name=$random_id.'__'.$date_for_upload.'.'.$ext[1];
                move_uploaded_file($_FILES['cv']['tmp_name'],$real_upload_name_move);
		 // $inputFileName = $real_upload_name;
		 
		 
		 
		 
		 $inputFileName = $real_upload_name; 
//					 if($check_resume_data==1)
//      {
      
      if($ext[1]=='docx')
      {
        function read_file_docx($filename){

$striped_content = '';
$content = '';

if(!$filename || !file_exists($filename)) return false;

$zip = zip_open($filename);

if (!$zip || is_numeric($zip)) return false;

while ($zip_entry = zip_read($zip)) {

if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

if (zip_entry_name($zip_entry) != "word/document.xml") continue;

$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

zip_entry_close($zip_entry);
}// end while

zip_close($zip);

//echo $content;
//echo "";
//file_put_contents('1.xml', $content);

$content = str_replace('', " ", $content);
$content = str_replace('', "\r\n", $content);
$striped_content = strip_tags($content);

return $striped_content;
}

$filename ="../../../upload_doc/".$inputFileName; //Add file with folder

$content = read_file_docx($filename);
if($content !== false) {

//echo nl2br($content);
  $resume_data=mysql_real_escape_string($content);

}
else {
echo 'Couldn\'t the file. Please check that file.';
}
  
      }
      
       //doc code 
    if($ext[1]=='doc')
    {
    
 $filename ="../../../upload_doc/".$inputFileName;
if ( file_exists($filename) ) {

if ( ($fh = fopen($filename, 'r')) !== false ) {

$headers = fread($fh, 0xA00);

# 1 = (ord(n)*1) ; Document has from 0 to 255 characters
$n1 = ( ord($headers[0x21C]) - 1 );

# 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
$n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );

# 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
$n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );

# (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
$n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );

# Total length of text in the document
$textLength = ($n1 + $n2 + $n3 + $n4);

$extracted_plaintext = fread($fh, $textLength);

# if you want the plain text with no formatting, do this
//echo 
 $resume_data=mysql_real_escape_string($extracted_plaintext);
# if you want to see your paragraphs in a web page, do this
// nl2br($extracted_plaintext);

}

}    
        
    }
		 
		 
		 
		 $select_upload_temp=mysql_query("select * from sedna_operator_request_consultants_reg where id='$reg_id'") or die(mysql_error());
		 if(mysql_num_rows($select_upload_temp)>0)
		 {
		mysql_query("update sedna_operator_request_consultants_reg set cv='$real_upload_name' where id='$reg_id'") or die(mysql_error());  
		//mysql_query("update sebna_profile_tbl set resume_data='$resume_data' where reg_id='$reg_id'")or die(mysql_error());  
		 echo "1";
         }else{
            
            mysql_query("insert into sedna_operator_request_consultants_reg set cv='$real_upload_name'");
            echo "1";
            
         }
		 
	 }
?>