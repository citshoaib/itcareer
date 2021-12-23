<?php
@session_start();
// retrieve session data
if(!$_SESSION["candidate_email"]){
      header('location:?page=login');
}
$jobid = $_GET['id'];
$candidate_id = $_SESSION['candidate_master_id'];
$id = $_SESSION['candidate_id'];

$select_cv = mysql_query("SELECT *  FROM sedna_operator_request_consultants_reg WHERE id='$candidate_id'") or die(mysql_error());
$row_cv = mysql_fetch_array($select_cv);

?>

<div class="container content mtb">
    
    <div class="row">
        <div class="col-lg-12">
        <h3 class="block-head">Apply Job</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 bgw pt_10">
<form action="model/applyjobs_model.php" id="theform" method="post" enctype="multipart/form-data">
     
        <div class="row">
            
            <div class="col-md-12 ">
           <!-- <h3>Not Searchable (Editing):</h3>-->
                        </div>
            </div>
        
        <div class="row">
            <label class="label col-md-3">Upload New Resume</label>
            <div class="input col-md-6">
                  <input type="radio" name="upload_new" class="upload_new" value="yes" required> Yes
                  <input type="radio" name="upload_new" class="upload_new" value="no" > No
            </div>
        </div>
        
        <div class="row" id="your_resume">
             <label class="label col-md-3">Your Resume</label>
             <div class="input col-md-6">
                <div class="act_as fl">
                  <input type="hidden" name="candidate_id" value="<?php echo $candidate_id;?>">
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="jobid" value="<?php echo $jobid;?>">
                <input type="hidden" name="uploded_cv" id='uploded_cv' value="<?php echo $row_cv['cv'];?>">
                    <a class="btn btn-default btn-sm btn-icon btn-primary" download="" href="../upload_doc/<?php echo $row_cv['cv'];?>"><?php echo $row_cv['cv'];?></a>
                    <a href="<?php echo $candidate_id;?>" class="btn btn-default btn-sm btn-icon btn-primary1" onClick="return hs.htmlExpand(this , {width:600, height: 900})"  >Preview</a>
                    <div class="highslide-maincontent" style="margin:5px;">
                        <iframe src="https://view.officeapps.live.com/op/embed.aspx?src=http://develop-a.cheshtainfotech.com/jobportal/cdms/upload_doc/<?php echo $row_cv['cv'];?>" style="width: 100%; height: 575px;"></iframe>
                   </div>
                </div>
             </div>
        </div>
        
        <div class="row" id="upload_cv">
        
            <label class="label col-md-3">Upload CV</label>
            <div class="input col-md-6">
            
             <div class="form-group form-md-line-input form-md-floating-label has-success">               
                <input type="hidden" name="candidate_id" value="<?php echo $candidate_id;?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="jobid" value="<?php echo $jobid;?>">
                <input name="cv" id="cv" value="" class="" type="file">                                   
                </div>
            </div>
        
        </div>
        
        <div class="row">
        
            <label class="label col-md-3">Comment</label>
            <div class="input col-md-6">
            
             <div class="form-group form-md-line-input form-md-floating-label has-success">
               <textarea name="comment" id="comment" class="form-control" required></textarea>                                  
                </div>
            </div>
        
        </div>
        
        <div class="row tc" > 
                              <div class="col-md-8 unit">
                               
                                
                                <input name="apply" class="btn btn-primary btn-lg" value="Apply" data-automation-id="sign-in-button" type="submit">
                             
                            </div>
                            
                            
                    
                        
                        
                        </div>
      
                        
                        
</form>
        </div>
    </div>
    
</div>

<script>
      
      $( document ).ready(function() {
            
            $('#upload_cv').hide();
            $('#your_resume').hide();
            
      $('.upload_new').click(function(){
            
      var upload_new = $('input[name=upload_new]:checked').val();
      
      //alert(upload_new);
      
      if(upload_new == 'no'){
          $('#upload_cv').hide();
          $('#your_resume').show();
          $('#upload_cv').css('display','none');
      }else{
         $('#upload_cv').show();
         $('#your_resume').hide();
         $("#uploded_cv").prop('disabled', true);
      }
            
            });
      
      });
</script>