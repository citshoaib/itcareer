<!--<script src="view/mark/test_min.js"></script>-->
<!--<script src="view/mark/test_boot.js"></script>-->
<script src="view/mark/test_mark.js"></script>
<!--<link rel="stylesheet" type="text/css" href="test_boot.css">-->

<style>
  /**
 * Highlight any element inside the context
 * because it can be freely defined
 */
.context :not(p) {
  background: #f1c40f;
  padding: 0;
}


/**
 * The following is not related to the plugin
 */
/*body {
  background: #fbfcfc;
}
*/
/*.container {
  max-width: 700px;
}

.form-group {
  margin-bottom: 5px;
}

.form-group:last-child {
  margin-bottom: 0;
}

.form-group label {
  display: block;
}

.form-group label.noTransform {
  text-transform: none;
}*/

</style>

<script>
   $(function() {

  var mark = function() {

    // Read the keyword
    var keyword = $("input[name='keyword_set']").val();

    // Determine selected options
    var options = {
      "each": function(element) {
        setTimeout(function() {
          $(element).addClass("animate");
        }, 250);
      }
    };
   

    // Mark the keyword inside the context
    $(".context").unmark();
    $(".context").mark(keyword, options);
  };

  $("input[name='keyword_set']").on("keyup", mark);
  
  mark();

});
</script>


<div class="container">
 
  <div class="panel panel-default">
    <div class="panel-heading">
      <form class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="keyword">Search term:</label>
            <input type="text" class="form-control input-sm" value="" name="keyword_set" id="keyword">
          </div>
        <button type="button" class="btn btn-default btn-sm" name="perform">Perform</button>
        </div>
      
      </form>
     </div>
    <div class="panel-body context">
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
        takimata sanctus est Lörem ipsum dolor sit amet. Lorem ipsüm dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
        et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
    </div>
   
  </div>
</div>


<a > read docx</a>


<?php
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

$filename = "fileUpload/28631793_1476697218.docx"; //Add file with folder

$content = read_file_docx($filename);
if($content !== false) {

echo nl2br($content);
}
else {
echo 'Couldn\'t the file. Please check that file.';
}

?>
<br>
<a>view Doc</a>
<br>


<?php

$filename = 'fileUpload/manish.doc';
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
echo $extracted_plaintext;

# if you want to see your paragraphs in a web page, do this
 nl2br($extracted_plaintext);

}

}

?>









