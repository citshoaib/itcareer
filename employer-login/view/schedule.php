 <?php
// retrieve session data
if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
?>
<div class="container content mtb">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Interview Schedule</h3>
           <?php
           
           $JobId = $_GET['JobId'];
           $candidate_id = $_GET['candidate_id'];
           
           $candidate_query = mysql_query("SELECT * FROM sedna_operator_request_consultants_reg where id='$candidate_id'") or die(mysql_error());
            $row=mysql_fetch_array($candidate_query);
            
            $email=$row['email'];           
 
 
            $select1=mysql_query("select * from sebna_profile_tbl where reg_id='$candidate_id'");
            $fetch2=mysql_fetch_array($select1);
            $profile_image = $fetch2['profile_image'];
            $first_name=$fetch2['first_name'];
            $middel_name=$fetch2['middel_name'];
           $last_name=$fetch2['last_name'];
           $city=$fetch2['city'];
            $country1=$fetch2['country'];
            $state=$fetch2['state'];
            //$employment_type1=$fetch2['employment_type'];
             $employment_type=explode(",",$fetch2['employment_type']);
            $work_authorization1=$fetch2['work_authorization'];
            $phone=$fetch2['phone_no'];
            $postal_code=$fetch2['postal_code'];
            $position=$fetch2['position'];
            $salary=$fetch2['salary'];
            $hourly_rate=$fetch2['hourly_rate'];
            $experience=$fetch2['experience'];
            $travel=$fetch2['travel'];
            $searchable=$fetch2['searchable'];
              $relocate=$fetch2['relocate'];
               $security=$fetch2['security'];
               $preferred_location=$fetch2['preferred_location'];
             $employer_name=$fetch2['employer_name'];
              $employer_company=$fetch2['employer_company'];
               $employer_email=$fetch2['employer_email'];
                $employer_number=$fetch2['employer_number'];
                
                if($first_name!='' && $middel_name!='' && $last_name!=''){
                  $candidate_name = ucwords($first_name).' '.ucwords($middel_name).' '.ucwords($last_name);  
                }
                elseif($first_name!='' && $last_name!=''){
                   $candidate_name = ucwords($first_name).' '.ucwords($last_name);  
                }
		    
		    $employer_details = mysql_query("SELECT * FROM sedna_form where id='".$_SESSION["employer_id"]."'") or die(mysql_error());
		    $row_employer = mysql_fetch_array($employer_details);
		    //echo "<pre>";
		    //print_r($row_employer);
		    //echo "</pre>";
		    $employer_contact = $row_employer['contact'];
		    $employer_email = $row_employer['email'];
                
                $country_details = mysql_query("SELECT * FROM country_master where country_code='$country1'") or die(mysql_error());
                $country_fetch = mysql_fetch_array($country_details);
                
                $address = $postal_code.','.ucwords($city).','.ucwords($state).','.ucwords($country_fetch['country_name']);
                
                $job_details_query = mysql_query("SELECT * FROM sedna_job_form where id='$JobId'") or die(mysql_error());
                $row_1=mysql_fetch_array($job_details_query);
		    
		    
                
                
                
           
           ?>
            <div class="row">
            <div class="col-xs-12 col-sm-12  col-md-12  col-lg-12  bgw pt_10">
            <form method="post" action="model/interview_schedule_model.php" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-6 unit">
                    <div class="input">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <input type="hidden" name="candidate_id" value="<?php echo $candidate_id;?>">
                            <input name="candidate_name" class="form-control <?php if($candidate_name!=''){?> edited <?php } ?>" <?php if($candidate_name!=''){?> readonly <?php } ?> required="" value="<?php echo $candidate_name;?>"  type="text">
                            <label for="form_control_1">Candidate Name</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 unit">
                    <div class="input">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
					<?php if($JobId!=''){?>
                            <input type="hidden" name="job_position" value="<?php echo $JobId;?>">
				    <select class="form-control" name="position" <?php if($JobId!=''){?> disabled <?php } ?>>
				    <?php }else{?>
                            <select class="form-control" name="job_position" <?php if($JobId!=''){?> disabled <?php } ?>>
				    <?php } ?>
                                <option value="">--Select Job Position--</option>
                                <?php
                                $select_job_details = mysql_query("SELECT * FROM sedna_job_form where employer_id='".$_SESSION['employer_id']."' ") or die(mysql_error());
                                while($row_1 = mysql_fetch_array($select_job_details)){
                                ?>
                                <option <?php if($JobId == $row_1['id']){?> selected <?php } ?> value="<?php echo $row_1['id'];?>"><?php echo $row_1['job_title'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                
                <div class="col-md-6 unit">
                    <div class="input">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <input name="office_phone_no" class="form-control <?php if($employer_contact!=''){?> edited <?php } ?>" value="<?php echo $employer_contact;?>" required="" type="text">
                            <label for="form_control_1">Office Phone Number</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 unit">
                    <div class="input">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <input name="office_email_address" class="form-control <?php if($employer_email!=''){?> edited <?php } ?>" value="<?php echo $employer_email;?>" required="" type="email">
                            <label for="form_control_1">Office Email Address</label>
                        </div>
                    </div>
                </div>
                
            </div>
            
            
             <div class="row">   
                <div class="col-md-6 unit">
                    <div class="input">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <input name="interview_date" class="form-control date_select" id="datepicker" required="" type="text" >
                            <label for="form_control_1">Preferred Interview Date</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 unit">
                    <div class="input">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <input name="interview_time" class="form-control time_select" id="timepicker" required="" type="text">
                            <label for="form_control_1">Preferred Interview Time</label>
                        </div>
                    </div>
                </div>
                
            </div>
             
             <div class="row">   
                <div class="col-md-6 unit">
                    <div class="input">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <input name="presenter" class="form-control " id="datepicker" required="" type="text">
                            <label for="form_control_1">Name of Presenter</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 unit">
                    <div class="input">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <textarea name="address" class="form-control" placeholder="Address"><?php echo $address;?></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
             
             <div class="row">
                <div class="col-md-12 unit">
                    <div class="input">
                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                            <textarea name="comment" class="form-control" placeholder="Comment"></textarea>
                        </div>
                    </div>
                </div>
             </div>
             <br>
            <div class="row">
                <div class="col-md-2 unit">
                    <input name="submit" class="btn btn-primary btn-lg" value="Submit" data-automation-id="sign-in-button" type="submit" >
                </div>            
            </div>
            </form>
            </div>
            </div>
           
            </div>
</div>
</div>

<script>
	var date_select = document.getElementsByClassName("date_select");
	
	[].forEach.call(date_select,function(el){
	el.onblur=function() {
		
		$( ".date_select" ).addClass( "edited" );
		
	}; 

	});
	
	var date_select = document.getElementsByClassName("time_select");
	
	[].forEach.call(date_select,function(el){
	el.onblur=function() {
		
		$( ".time_select" ).addClass( "edited" );
		
	}; 

	});
</script>