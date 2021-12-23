        <?
        $date_for_upload=strtotime(date("Y/m/d H:i:s"));
        $random_id= rand();
        
        //if (file_exists("../../fileUpload/" . $_FILES["cv"]["name"]))
        //{
        //echo $_FILES["cv"]["name"] . " already exists. ";
        //}
        //else
        //{
        
        $array = explode('.',$_FILES["cv"]["name"]);
        $extension = end($array);
        $path_name="../../fileUpload/";
        $new_file_name=$random_id."_".$date_for_upload.".".$extension;
        $upload_name = $path_name.$random_id."_".$date_for_upload.".".$extension;
        
        move_uploaded_file($_FILES["cv"]["tmp_name"],$upload_name);
        
        
        
         // docx code 
      
      if($extension=='docx')
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

 $filename ="../../fileUpload/".$new_file_name; //Add file with folder

$content = read_file_docx($filename);
if($content !== false) {

//echo nl2br($content);
 $resume_data=$content;

}
else {
echo 'Couldn\'t the file. Please check that file.';
}
  
      }
      
      // doc code 
    if($extension=='doc')
    {
    
 $filename ='../../fileUpload/'.$new_file_name;
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
  $resume_data=$extracted_plaintext;
# if you want to see your paragraphs in a web page, do this
// nl2br($extracted_plaintext);

}

}    
        
    }
    
        
        
        
        
       
        
        
        
        echo '
        <a  href="" onClick="return hs.htmlExpand(this , {width:800})">Preview</a>
        <div class="highslide-maincontent" style="margin:5px;">  
        <iframe width="100%" height="500px" id="file_name"  class="doc" src="https://view.officeapps.live.com/op/view.aspx?src=http://develop-a.cheshtainfotech.com/sedna/Operator/fileUpload/'.$new_file_name.'"></iframe>
        </div>
        ';
        
         if($resume_data!='')
        {
    echo '<input type="hidden" name="resume_data" value="1">'; 
        }
        else
        {
          
           echo '<br><span style="color:red;"> *please copy and paste complete resume here</span>
           <textarea name="resume_data" id="editor1" placeholder=""  rows="20" cols="70" required>
               
                                 </textarea>
                                <script>
									CKEDITOR.replace( "editor1");
 
									</script> 
                                 '; 
            
        }
     
        
        ?>