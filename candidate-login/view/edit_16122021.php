<?php
@session_start();
 $current_date =strtotime(date("d-m-Y"));
$reg_id= $_REQUEST['id'];
  $select=$conn->query("select * from sedna_operator_request_consultants_reg where id='$reg_id'");
$fetch=$select->fetch_array();
 
 $email=$fetch['email'];
 $cv_name=$fetch['cv'];
 
 
 $select1=$conn->query("select * from sebna_profile_tbl where reg_id='$reg_id'");
 $fetch2=$select1->fetch_array();
  $first_name=$fetch2['first_name'];
		$middel_name = $fetch2['middel_name'];
 $last_name=$fetch2['last_name'];
 
 $city=$fetch2['city'];
 $gender=$fetch2['gender'];
 $caste=$fetch2['caste'];
 
 $remark=$fetch2['remark'];
  $Country1=$fetch2['country'];
   $state=$fetch2['state'];
   $employment_type=explode(",",$fetch2['employment_type']);
  $work_authorization1=$fetch2['work_authorization'];
  $phone=$fetch2['contact'];
  $postal_code=$fetch2['zipcode'];
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
       $language=explode(",",$fetch2['language_know']);
       $profile_image=$fetch2['profile_image'];
?>

  <div class="container content mtb">
       <div class="row">
        <div class="col-lg-12">
<h3 class="block-head">Edit Candidate</h3>
</div>
        <div class="col-xs-12 col-sm-12  col-md-12  col-lg-12  bgw pt_10">
<form action="model/edit_model.php" id="theform" method="post" enctype="multipart/form-data">
     
        
    
         <div class="row">
                            <div class="col-md-4 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="first_name" value="<?php echo $first_name; ?>" class="alphaonly form-control <?php if($first_name!=''){echo 'edited'; } ?>" >
                                    <input type="hidden" name="reg_id" value="<?php echo $reg_id; ?>" class="form-control" >
                                    <label for="form_control_1">First Name</label>
                                    </div>
                                </div>
                            </div>
																												
																												<div class="col-md-4 unit">
                               
                                <div class="input">
                              <div class="form-group form-md-line-input form-md-floating-label has-success">

                                    <input type="text"  value="<?php echo ucfirst($middel_name); ?>" class="alphaonly form-control <?php if($middel_name!=''){echo 'edited'; } ?>" name="middel_name">   <label for="form_control_1">Middel Name</label>
                                    </div>
                                </div>
                            </div>
																												
                            <div class="col-md-4 unit">
                             
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="alphaonly form-control <?php if($last_name!=''){echo 'edited'; } ?>" >
                                    
                                      <label for="form_control_1">Last Name</label>
                                    </div>
                                </div>
                            </div> </div>
     <hr>
    
         <div class="row">
                            <div class="col-md-4 unit">
                                
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" readonly name="email" value="<?php echo $email; ?>" class="form-control <?php if($email!=''){echo 'edited'; } ?>">
                                    <label for="form_control_1">Email</label>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 unit">
                     
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="number" name="contact" value="<?php echo $phone; ?>" onkeypress="return isNumber(event);" class="form-control <?php if($phone!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">Phone No.</label>
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 unit">
                             <div class="input" id="country">
                                   
                                    <!--<input type="text" name="range_val" class="form-control">
                                    <label for="form_control_1">Country</label>-->
                                     <select class="form-control"  onchange="AjaxGetState(this.value)" name="country" >
                                                <option  value="">Country...</option>
                   <?php
                  $country= $conn->query("select * from  country_master order by country_name ASC");
                   while($fetch_country=$country->fetch_array())
                   {
         
                   ?>
                                                <option value="<?php echo $fetch_country['country_code']; ?>" <?php echo ($fetch_country['country_code']==$Country1)? 'selected' : '';  ?>><?php echo $fetch_country['country_name']; ?></option>
                      <?php } ?>
                                            </select>
                                    
                                     
                                
                            </div>
                            </div>
                            
                     
                            
                        </div>
     <hr>
                       <div class="row">
                            <div class="col-md-4 unit">
                               <div class="input" id="state">
                                 <select name="state"    class="form-control">
                <option value="">State name</option>
                <?php
                 $state_setect= $conn->query("select *  FROM state_master where StateID='".$state."' ");
                   while($fetch_state=$state_setect->fetch_array())
                   {
                ?>
                <option value="<?php echo  $fetch_state['StateID']?>" <?php echo ($fetch_state['StateID']==$state)? 'selected' : '';  ?>><?php echo  $fetch_state['state_name']?></option>
                
                <?php
                   }
                ?>
              
            </select>       </div>    
                               
                            </div>
                            <div class="col-md-4 unit">
                               
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="city" id="city"  value="<?php echo $city; ?>" class="alphaonly form-control <?php if($city!=''){echo 'edited'; } ?>">
                                     <label for="form_control_1">City</label>
                                    
                                    </div>
                                </div>   
                            </div>
                            <div class="col-md-4 unit">
                                 
                                 
                                 
                                 <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text"  name="postal_code" id="postal_code" onkeypress="return isNumber(event);" onblur="zip_id(this.value)" value="<?php echo $postal_code; ?>" class="form-control <?php if($postal_code!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Zipcode</label>
                                    </div>
                                </div>
                                 
                                 
                                 
                                 
                            </div>
                        </div> 
    
                             <hr>
<div class="row">
    <div class="col-md-4 unit">
          <div class="input">
               
              <label class="col-md-4 fl pall_5">Searchable:</label>   
              <div class="fl">
              <div class="col-md-8 unit"><input type="checkbox" name="searchable" value="yes"  data-toggle="toggle" <?php if($searchable!=''){ echo "checked"; } ?> ></div>
</div>  
                     </div>        
         
                        </div> 
     <div class="col-md-4 unit">
        <div class="input">
<label class="col-md-3">Gender:</label>
<div class="col-md-3 unit">Male<input style="margin: -15px 0px 0px 20px;" type="radio" name="gender" class="form-control" <?php if($gender=='male'){ ?> checked="checked" <?php } ?> value="male"></div>
<div class="col-md-3 unit">Female<input style="margin: -15px 0px 0px 35px;" type="radio" name="gender" class="form-control" <?php if($gender=='female'){ ?> checked="checked" <?php } ?>  value="female"></div>            
    
    </div></div>
    
    
     </div>
    
     <hr>
                       <div class="row">
                  
<div class="col-md-4 unit">
    <label class="col-md-3">Category:</label>
    <div class="col-md-9">
    <select name="caste" class="form-control">
    <option <?php if($caste=='general'){?> selected="selected"<?php }?> value="general">GENERAL</option>
    <option <?php if($caste=='gen-ews'){?> selected="selected"<?php }?> value="gen-ews">GEN-EWS </option>
    <option <?php if($caste=='obc'){?> selected="selected"<?php }?> value="obc">OBC </option>
    <option <?php if($caste=='sc'){?> selected="selected"<?php }?> value="sc">SC </option>
    <option <?php if($caste=='st'){?> selected="selected"<?php }?> value="st">ST </option>
    </select></div></div>


<div class="col-md-4 unit">
<label class="col-md-2">Title:</label>
<div class="input col-md-10">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="text" name="position" value="<?php echo $position; ?>" class="form-control <?php if($position!=''){ echo 'edited';} ?>" ><label for="form_control_1">Desired Position</label>
 
</div>	</div> 

</div>
    
   
     <div class="col-md-4 unit">
    <label class="col-md-3">Experience:</label>
                                <div class="input col-md-9">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                  <input type="text" name="experience" value="<?php echo $experience; ?>" class="form-control <?php if($experience!=''){echo 'edited'; } ?>">
                                 <label for="form_control_1">Years</label>   
                         </div> </div></div></div>
                       <hr>  
                         
                         <div class="row">
                       <div class="col-md-4 unit"> 
<label class="col-md-3">Type:</label>
<div class="input col-md-9">
<select class="form-control" multiple  name="employment_type[]">
    
            <option >Select type </option>
    <?php

   $employment_type1= $conn->query("select * from sebna_employment_type where status='1'");
   while($fetch_employment_type=$employment_type1->fetch_array())
   {
    ?>
            <option value="<?php echo $fetch_employment_type['id']; ?>"  <?php  if(in_array($fetch_employment_type['id'],$employment_type)) { echo 'selected';}else { echo " "; } ?>><?php echo $fetch_employment_type['employment_type']; ?></option>
    <?php } ?>
        </select>
</div>
</div>

<div class="col-md-3 unit"> 
<label class="col-md-4">Relocate:</label>
                                <div class="input col-md-8">
                                <div class="fl">
                      <input type="checkbox" name="relocate"  value="yes" data-toggle="toggle" <?php if($relocate!=''){ echo "checked"; } ?>></div>
                                </div>   </div>
            <div class="col-md-5 unit">                    
    <label class="col-md-5">Preferred location:</label>
                                <div class="input col-md-7">
                                   <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="preferred_location" value="<?php echo $preferred_location; ?>" class="alphaonly form-control <?php if($preferred_location!=''){ echo 'edited';} ?>" ><label for="form_control_1">Preferred location</label>
									 
							</div>	</div>                            
</div>




</div>
    
    
    
     <hr>  
                     <div  id="work_authorization_id_12">
                                
                               
                
                         
                       
                       <hr>
              
                       
     <div class="row">  <div class="col-md-6 unit">   
                        <div class="input col-md-12">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="salary" value="<?php echo $salary; ?>" class="form-control <?php if($salary!=''){ echo 'edited';} ?>">
                                    <label for="form_control_1">Annual Salary</label>
                                    
                                    </div>
                                </div></div>
                       <div class="col-md-6 unit"> 
                 <div class="input col-md-12">
                                
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="hourly_rate" value="<?php echo $hourly_rate; ?>" class="form-control <?php if($hourly_rate!=''){ echo 'edited';} ?>">
                                     <label for="form_control_1">Expected Salary</label>
                                    
                                    </div>
                                </div>
     </div>    
     
               
                       </div>                
                       
       <hr>
                       
     <div class="row">  <div class="col-md-6 unit">   
                   <label class="col-md-4">Upload CV</label>
                                <div class="input col-md-8">
                                
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="file" name="cv" id="cv" value="" class="">
                                    
                                    
                             
                                   <div class="act_as fr" >
                                       <?php
                                $select_upload_temp= $conn->query("select * from sedna_temp_upload where consultant_id='$reg_id'");
            if($select_upload_temp->num_rows>0)
         {
          $fetch_upload_temp= $select_upload_temp->fetch_array();
         $cv_name=  $fetch_upload_temp['cv'];
         ?>
          <a href="../../candidate-login/upload_doc/<?php echo $cv_name;?>" download>Download CV</a>
         <?php
         }
         else
         {
           ?>
        <a href="../../candidate-login/upload_doc/<?php echo $cv_name;?>" download>Download CV</a>
        <?php
        }
          ?>
                                    
                                    
                                     </div>
                                  
                                    
                                    </div>
                                </div>
                                </div>
                       <div class="col-md-6 unit"> 
             <label class="col-md-4">Profile Picture</label>
                                <div class="input col-md-8">
                                
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="file" name="dp" id="dp" value="" >
                                    <input type="hidden" name="recent_image" value="<? echo $profile_image;?>">
                                   
                                    
                             
                                   <div class="act_as fr" > </div>
                                   
                                 </div>
                                </div>
     </div>    
     
    </div>   
    
       <hr>
                       
     <div class="row">  <div class="col-md-6 unit">  <label class="col-md-2">Remark:</label>
                            <div class="input col-md-8">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <textarea name="remark" class="form-control" placeholder="Remark"  spellcheck="false"><?php echo $remark;?></textarea>
                                </div>
                            </div> </div>
     
   <!--</div>-->
   <!--  <hr>-->
                       
   <!--  <div class="row">-->
    
    <div class="col-md-6 unit">
        <label class="col-md-2">Language</label>
                                <div class="input col-md-10">
                                 
                                   <?php
                                    foreach ($language as $key => $item) {
                                   ?>
                                   <div class='row remove_row_<?php echo $key;?>'>
                                   <div class='input col-md-7'>
                                        <div class='form-group form-md-line-input form-md-floating-label has-success'>
                                            <input type='text' name='language[]'  value='<?php echo $item;?>' class='form-control <?php if($language!=''){echo 'edited'; } ?> language_field'>
                                        </div>
                                    </div>
                                    <div class='input col-md-5'>
                                        <div class='form-group form-md-line-input form-md-floating-label has-success'>
                                           <a class=" remove" onclick="language_remove('<?php echo $key;?>');" href="javascript:void(0);"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                                            </div>
                                    </div>
                                   </div>
                                   <?php } ?>
                                   
                                <div id="append_language">
                                  </div>
                               <!--    <div class="input col-md-3">-->
                               <!--</div>-->
        <div class="col-md-12 unit">
<input style="margin-left: -14px;" class="btn btn-primary btn-lg" id="add_button" style="padding: 6px 12px;" value="Add" type="button">
</div>  
                                   
                                   
                                   <div class="cl"></div> 
            </div>                       
        
    </div>  
    
    
    
               </div>
    
    
                  <hr>
                  
                    <fieldset>
    <legend>Add Skills:</legend>
                  
                  
                        
                              <div class="row">
            
            <div class="col-md-12 ">
            <h3>Skills </h3>
                        </div>
            </div>
    
      <?php
            
                $select_skill=$conn->query("select * from sedna_skills where reg_id='$reg_id'");
               while($fetch_skill=$select_skill->fetch_array())
               {
                //  print_r($fetch_skill);
                ?>
            <div class="row <?php echo $fetch_skill['id'];?>">
                
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="skill_name[]" value="<?php echo $fetch_skill['skill_name'];  ?>" class="form-control <?php if($fetch_skill['skill_name']!=''){echo 'edited'; } ?>">
                                      <label for="form_control_1">Skill</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="year_exp[]" value="<?php echo $fetch_skill['year_exp'];  ?>" class="form-control <?php if($fetch_skill['year_exp']!=''){echo 'edited'; } ?>" >
                                    
                                    <label for="form_control_1">Yrs Exp</label>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="last_used[]" value="<?php echo $fetch_skill['last_used'];  ?>" class="form-control <?php if($fetch_skill['last_used']!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">Last Used</label>
                                </div></div>
                            </div>
                <div class="col-md-3 pt_10">        <a href="javascript:void(0);" class="delete" onclick="skill_remove(<?php echo $fetch_skill['id'];?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a> </div>
            </div>
            <?php
               }
            ?>
    
     <div class="row skills">
                
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="skill_name[]" value="" class="form-control">
                                      <label for="form_control_1">Skill</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="year_exp[]" value="" class="form-control" >
                                    
                                    <label for="form_control_1">Yrs Exp</label>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="last_used[]" value="" class="form-control" >
                                     <label for="form_control_1">Last Used</label>
                                </div></div>
                            </div>
            </div>
                         <div class="row skills_test">
         <div class="col-md-12 unit">
<input class="btn btn-primary btn-lg" style="padding: 6px 12px;" value="Add" onclick="skills();" type="button">
</div>             
                        
                        </div></fieldset>
                        <hr>
    
                   <fieldset>
    <legend>Add Work Experience:</legend>
  
    <div class="row">
            
            <div class="col-md-12 ">
            <h3>Work Experience </h3>
                        </div>
            </div>
     <?php
                     $select_work_experience=$conn->query("select * from sebna_work_experience where reg_id='$reg_id'");
                     while($fetch_work_experience=$select_work_experience->fetch_array())
                     {
                      $idwk= $fetch_work_experience['id'];
                      
                     ?>
         <div class="row <?php echo $idwk; ?>">
           
                            <div class="col-md-12 unit">
                               <hr />
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="job_title[]" value="<?php echo $fetch_work_experience['job_title']; ?>" class="job_title form-control <?php if($fetch_work_experience['job_title']!=''){echo 'edited'; } ?> " >
                                      <label for="form_control_1">Job Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="comapnay[]" value="<?php echo $fetch_work_experience['comapnay']; ?>" class="comapnay form-control <?php if($fetch_work_experience['comapnay']!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Company</label>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="start_date[]" value="<?php echo $fetch_work_experience['start_date']; ?>" class="start_date form-control demo-1 <?php if($fetch_work_experience['start_date']!=''){echo 'edited'; } ?>" >
                                    <label for="form_control_1">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="end_date[]" value="<?php echo $fetch_work_experience['end_date']; ?>" class="end_date form-control demo-1 <?php if($fetch_work_experience['end_date']!=''){echo 'edited'; } ?>" >
                                     <label for="form_control_1">End Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit pt_10">
                               
                                <div class="input">
                                 <input type="radio" name="current[]" <?php echo ($fetch_work_experience['current']!='' )?'checked':'';  ?>  value="<?php echo $current_date; ?>"  class="ng-pristine ng-valid current">   Current 
                                </div>
                            </div>
                             <div class="col-md-3 unit pt_10"><a href="javascript:void(0);" class="delete" onclick="work_experience_remove(<?php echo $fetch_work_experience['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></div>
         </div>
        
         <?php
                     }
         ?>
       <div class="row work_experience">
        
                            <div class="col-md-12 unit">
                              <hr />   
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="job_title[]" value="<?php echo $fetch_work_experience['job_title']; ?>" class="job_title form-control" >
                                      <label for="form_control_1">Job Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="comapnay[]" value="<?php echo $fetch_work_experience['comapnay']; ?>" class="comapnay form-control" >
                                    <label for="form_control_1">Company</label>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-3 unit">
                               
                                <div class="input">
                                  <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="start_date[]" value="<?php echo $fetch_work_experience['start_date']; ?>" class="start_date form-control demo-1" >
                                    <label for="form_control_1">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="end_date[]" value="<?php echo $fetch_work_experience['end_date']; ?>" class="end_date form-control demo-1" >
                                     <label for="form_control_1">End Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 unit pt_10">
                               
                                <div class="input">
                                 <input type="radio" name="current[]" <?php echo ($fetch_work_experience['current']!='' )?'checked':'';  ?>  value="<?php echo $current_date; ?>"  class="ng-pristine ng-valid current">   Current 
                                </div>
                            </div>
         </div>
         
                    <div class="row work_experience_test">        
                            <div class="col-md-12 unit">
<input class="btn btn-primary btn-lg" style="padding: 6px 12px;" value="Add" onclick="work_experience();" type="button">
</div>
                                
                           
                        
                        
                        </div>      
                        
   </fieldset>
                        <hr>
    
                   <fieldset>
    <legend>Add Education:</legend>
     
     
         <div class="row">
            
            <div class="col-md-12 ">
            <h3>Education</h3>
                        </div>
            </div>
     <?php
            $select_education=$conn->query("select * from sedna_education where reg_id='$reg_id'");
                     while($fetch_education=$select_education->fetch_array())
                     {
                              
            ?>
            <div class="row <?php echo $fetch_education['id'];?>" id="">
                            
                            
                        <div class="col-md-2 unit">
                               
                                <div class="input">
                                     <select class="form-control" name="education_type[]">
                                                <option >...</option>
                                                <?php
                                                $education_master=$conn->query("select * from sedna_education_master");
                                                while($fetch_education_master=$education_master->fetch_array())
                                                {
                                                ?>
                                                <option value="<?php echo $fetch_education_master['id']; ?>" <?php echo  ($fetch_education_master['id']==$fetch_education['education'])?'selected':''; ?>><?php echo $fetch_education_master['education_type']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="institution[]" value="<?php echo $fetch_education['institution']; ?>" class="form-control <?php if($fetch_education['institution']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Institution</label> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_city[]" value="<?php echo $fetch_education['city']; ?>" class="form-control <?php if($fetch_education['city']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">City/ST</label> 
                                 </div>
                                </div>
                            </div>
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_country[]" value="<?php echo $fetch_education['country']; ?>" class="form-control <?php if($fetch_education['country']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Country</label> 
                                 </div>
                                </div>
                            </div>
                              
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_year[]"  value="<?php echo $fetch_education['year']; ?>" class="form-control <?php if($fetch_education['year']!=''){echo 'edited'; } ?>" >
                                   <label for="form_control_1">Year</label> 
                                 </div>
                                </div>
                            </div>
                              
                              
                              
                              
                              <div class="col-md-2 unit pt_10"> <a href="javascript:void(0);" class="delete" onclick="delete_education(<?php echo $fetch_education['id'];?>)"><i aria-hidden="true" class="fa fa-trash-o"></i> Delete</a></div>
                              
            </div>
            <?php } ?>
        <div class="row education" id="">
                            
                            
                        <div class="col-md-2 unit">
                               
                                <div class="input">
                                     <select class="form-control" name="education_type[]">
                                                <option value="" >...</option>
                                                <?php
                                                $education_master=$conn->query("select * from sedna_education_master");
                                                while($fetch_education_master=$education_master->fetch_array())
                                                {
                                                ?>
                                                <option value="<?php echo $fetch_education_master['id']; ?>"><?php echo $fetch_education_master['education_type']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                    <input type="text" name="institution[]" class="form-control" >
                                   <label for="form_control_1">Institution</label> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_city[]" class="form-control" >
                                   <label for="form_control_1">City/ST</label> 
                                 </div>
                                </div>
                            </div>
                              <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_country[]" class="form-control" >
                                   <label for="form_control_1">Country</label> 
                                 </div>
                                </div>
                            </div>
                              
                               <div class="col-md-2 unit">
                               
                                <div class="input">
                                 <div class="form-group form-md-line-input form-md-floating-label has-success">
                                 <input type="text" name="edu_year[]" class="form-control" >
                                   <label for="form_control_1">Year</label> 
                                 </div>
                                </div>
                            </div>
            </div>
                               <div class="row education_test"> 
               
                        
                        <div class="col-md-12 unit">
<input class="btn btn-primary btn-lg" style="padding: 6px 12px;" value="Add" onclick="education();" type="button">
</div>
                  
                            
                    
                        
                        
                        </div>
                     </fieldset>
                        <hr>
    
                   <fieldset>
    <legend>Add Social Media Details:</legend>
                        
           <div class="row">

<div class="col-md-12 ">
<h3>Social Media Details </h3>
</div>
</div>             
 <?php

$mor_media_info = $conn->query("SELECT * FROM candidate_more_social_nedia_info where candidate_id='$reg_id' ");
$countrow_media=$mor_media_info->num_rows;
$kk=0;
if($countrow_media>0){
while($media_row=$mor_media_info->fetch_array()){
?>
<div class="row" id="media_<?php echo $kk;?>">
<div class="input col-md-4">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<select class="form-control select2me select2-hidden-accessible"   name="social_media_name[]" id="social_media_name_<?php echo $kk;?>">
<option value="">--Select Social Media Type--</option>
<option <?php if($media_row['social_media_department'] == 'facebook'){ ?> selected <?php } ?> value="facebook">Facebook</option>
<option <?php if($media_row['social_media_department'] == 'instagram'){ ?> selected <?php } ?> value="instagram">Instagram</option>
<option <?php if($media_row['social_media_department'] == 'twitter'){ ?> selected <?php } ?> value="twitter">Twitter</option>
<option <?php if($media_row['social_media_department'] == 'google+'){ ?> selected <?php } ?> value="google+">Google+</option>
<option <?php if($media_row['social_media_department'] == 'linked_in'){ ?> selected <?php } ?> value="linked_in">LinkedIn</option>
<option <?php if($media_row['social_media_department'] == 'you_tube'){ ?> selected <?php } ?> value="you_tube">YouTube</option>
</select>
</div>
</div>

<div class="col-md-4">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="url" name="social_media_url[]" id="social_media_url_<?php echo $kk;?>" class="form-control <?php if($media_row["media_url"]!=''){echo 'edited'; } ?>" value="<?php echo $media_row['media_url'];?>" >
<label for="form_control_1">URL</label>
</div>

<!--<img class="pt_10 " style="position: absolute; right: 0px; top: 6px; width: 18px; height: 27px;" align="middle" src="../admin/template/images/supprimer.png" width="20" height="20"  <?php if($kk<=0){?> style="visibility:hidden " <?php }?>  border="0" onclick="return removeeee_media(this.id);" id="<?php echo $kk;?>"  value="Remove"/>-->
</div>
<div class="col-md-2">
<a class=" remove" onclick="return removeeee_media(<?php echo $kk; ?>);" href="javascript:void(0);"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
</div>
<div class="cl"></div>
</div>
<?php
$kk++;
}
}else{
?>                     
 <div class="row">
<div class="input col-md-4">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<select class="form-control select2me select2-hidden-accessible"   name="social_media_name[]" id="social_media_name_<?php echo $kk;?>">
<option value="">--Select Social Media Type--</option>
<option value="facebook">Facebook</option>
<option value="instagram">Instagram</option>
<option value="twitter">Twitter</option>
<option value="google+">Google+</option>
<option value="linked_in">LinkedIn</option>
<option value="you_tube">YouTube</option>
</select>
</div>
</div>

<div class="col-md-4">
<div class="form-group form-md-line-input form-md-floating-label has-success">
<input type="url" name="social_media_url[]" id="social_media_url_<?php echo $kk;?>" class="form-control <?php if($media_row["media_url"]!=''){echo 'edited'; } ?>" value="<?php echo $media_row['media_url'];?>" >
<label for="form_control_1">URL</label>
</div>

</div>
<div class="cl"></div>
</div>                     
   
<?php } ?>

<div id="append_media"></div>  
<div class="row" >
<div class="col-md-12 unit">
<input name="addnew" id="addnew" class="btn btn-primary btn-lg" style="padding: 6px 12px;" value="Add" onclick="return append_media();" type="button">
</div>
</div><br>


                        
                           </fieldset>
                           <hr>
        <div class="row">
            <div class="col-md-12 ">
                <h4 id="header">Record for Test</h4><video id="your-video-id" controls autoplay playsinline width="350"></video>
                <br><br>
            </div>
        </div> 
    
          <div class="row"> 
                              <div class="col-md-2 unit">
                               
                                
                                <input type="submit" name="update" class="btn btn-primary btn-lg"  value="Update" data-automation-id="sign-in-button" >
                             
                            </div>
                            
                            
                    
                        
                        
                        </div>        

    </form></div></div></div>












































<script type="text/javascript">
		  //$('#addedRows').hide(); 
		   
var rowCount = 0;
function education(frm) {
 //$('#addedRows').show();
 //alert(rowCount);
rowCount ++;
//var recRow = '<tr class="experience_row'+rowCount+'"><td>Job Title</td><td style="text-align: left;"><input type="text" class="form-control" name="job_title[]" value=""  placeholder="Job Title"></td></tr><tr class="experience_row'+rowCount+'"><td>Comapnay</td><td style="text-align: left;"><input type="text" class="form-control" name="comapnay[]" value=""  placeholder="Comapnay"></td></tr><tr class="experience_row'+rowCount+'"><td>Start Date</td><td style="text-align: left;"><input type="text" class="form-control" name="start_date[]" value=""  placeholder="Start Date"></td></tr><tr class="experience_row'+rowCount+'"><td>End Date</td><td style="text-align: left;"><input type="text" class="form-control" name="end_date[]" value=""  placeholder="End Date"><br><input type="checkbox" name="current[]" value="" > Current Date &nbsp;<a href="javascript:void(0);" onclick="removeRow('+rowCount+');">Delete</a> </td></tr>';
var recRow = '<div class="row education'+rowCount+'" >'+jQuery('.education').html()+'<div class="col-md-2 pt_10"><a class="remove" href="javascript:void(0);" onclick="removeRow('+rowCount+');"><i class="fa fa-minus-circle"></i>  Remove</a></div></div>';

jQuery('.education_test').before(recRow);





}

function removeRow(removeNum) {
		
		  
jQuery('.education'+removeNum).remove();

}
</script>
<script type="text/javascript">
		  //$('#addedRows').hide(); 
		   
var rowCount = 0;
function skills(frm) {
 
rowCount ++;
var recRow = '<div class="row skills'+rowCount+'" >'+jQuery('.skills').html()+'<div class="col-md-3 pt_10"><a class="remove" href="javascript:void(0);" onclick="removeRowskills('+rowCount+');"><i class="fa fa-minus-circle"></i> Remove</a></div></div>';

jQuery('.skills_test').before(recRow);




}

function removeRowskills(removeNum) {
		 
		  
jQuery('.skills'+removeNum).remove();

}
</script>
<script type="text/javascript">
		  //$('#addedRows').hide(); 
		   
var rowCount = 0;
var jdsjd;
jQuery( document ).ready(function() {

//
//var ss212=$('.work_experience_test').prev().attr("class");
////alert(ss212[2]);
//str=ss212.split(" ");
//
//rowCount = str[2];

   jdsjd =  jQuery('.work_experience').html();

   
});

function work_experience(frm) {
 //$('#addedRows').show();
 //alert(rowCount);
rowCount ++;

var recRow = '<div class="row work_experience'+rowCount+'" >'+jdsjd+'<div class="col-md-3 pt_10"><a href="javascript:void(0);" class="remove" onclick="removeRowwork_experience('+rowCount+');"><i class="fa fa-minus-circle"></i> Remove</a></div></div>';

jQuery('.work_experience_test').before(recRow);

//var ss=jQuery('.work_experience'+rowCount).find('.job_title').attr('name','job_title['+rowCount+']');
//var ss=jQuery('.work_experience'+rowCount).find('.comapnay').attr('name','comapnay['+rowCount+']');
//var ss=jQuery('.work_experience'+rowCount).find('.start_date').attr('name','start_date['+rowCount+']');
//var ss=jQuery('.work_experience'+rowCount).find('.end_date').attr('name','end_date['+rowCount+']');
//var ss=jQuery('.work_experience'+rowCount).find('.current').attr('name','current['+rowCount+']');


$('.demo-1').monthpicker();

jQuery(".current").click(function() {
   
   jQuery(".current").each(function(){
         jQuery('.current').prop('checked', false);   
     jQuery(".end_date").prop("disabled", false);
      });
     
  jQuery(this).prop('checked', true);  
  var a1223= jQuery(this).parent().parent().prev().find('input').attr('disabled', 'disabled');
  var a12234= jQuery(this).parent().parent().prev().find('input').val('');
    
    
   
   
   

    });
  
jQuery(".demo-1").click(function() {     
       
	   	 jQuery(this).addClass("edited");
	   //alert(a1223);
    });




}

function removeRowwork_experience(removeNum) {
		
		  
jQuery('.work_experience'+removeNum).remove();

}
</script>

<script>
 function delete_education(del_id) {
//alert(del_id);
$.ajax({
            type: 'POST',      
           url: "view/ajax/delete_education.php",
           data:"uid="+del_id,
           async: true,
            success: function(data) {
                $("."+del_id).hide();
            //window.location.reload(); 
                          }
           
              
                 
            }) ;
 }
</script>

<script>
 function skill_remove(skills_id)
 {
  //alert(skills_id);
  $.ajax({
            type: 'POST',      
           url: "view/ajax/delete_skill.php",
           data:"uid="+skills_id,
           async: true,
            success: function(data) {
           
           $("."+skills_id).hide();
            //window.location.reload(); 
                          }
           
              
                 
            }) ;
  
 }
</script>

<script>
 function work_experience_remove(work_experience_id)
 {
 // alert(work_experience_id);
  $.ajax({
            type: 'POST',      
           url: "view/ajax/delete_work_experience.php",
           data:"uid="+work_experience_id,
           async: true,
            success: function(data) {
			 //alert(data);
              $("."+work_experience_id).hide();
            //window.location.reload(); 
                          }
           
              
                 
            }) ;
  
 }
</script>


 <script>
	  function AjaxGetState(country_id,select_state) {
	  //alert("ada"+select_state);
	  $.ajax({
	  type: "POST",
	  url: "view/ajax/state.php?country_id="+country_id,
	  //data:'country_id='+val,
	  success: function(data){
	  $("#state").html(data);
	  if (select_state!='') {
		// alert(select_state);
	  $("#state>select[name=state]").find("option[value='"+select_state+"']").attr("selected","selected");
	  }
	  }
	  });
	  }
	  
	  
	  </script>
	  
	  <script>

     
 function zip_id(id)
	  {
	  if(id!==''){
	  //alert(id);
	  jQuery.ajax({
	  url : "view/ajax/get_new_zip.php",
	  type:"POST",
	  data: "id="+id,
	  Async: true,
	  success:function(data)
	  {
	  //alert(data);
	  
	  var res = data.split("#");
	  //
	  
	  var country=$("#country>select[name=country]>option:selected").val();
	  if (country=='') {
	  //alert(res['0']);
	  $("#country>select[name=country]").find("option[value='"+res['0']+"']").attr("selected","selected").change();
	  
	  }
	  
	  
	  var state=$("#state>select[name=state]>option:selected").val();
	  if (state=='') {
	  var country_id=res['0'];
	  var select_state= res['1'];
	  //$("select[name='theNameYouChose']").find("option[value='theValueYouWantSelected']").attr("selected",true);
	  AjaxGetState(country_id,select_state);
	  
	  
	  
	  }
	  
	  var city=	$("#city").val();
	  if (city=='') {
	  
	  
	  var select_city=res['2'];
	  var state_id=res['1'];
	  
      //alert("ddgd"+select_city);
      
      	$("#city").val(select_city);
        
         $("#city").addClass("edited");
      
	  //AjaxShipping(state_id,select_city);
	  
	  // alert(select_city);
	  //$("#city>select[name=city]").find("option[value='"+select_city+"']").attr("selected","selected");
	  
	  
	  }
	  
	  
	  }
	  });
	  
	  }
	  }
      
      
      
      
      
      
	  
	  </script>


                                 <script>
						   $( document ).ready(function() {
                              
                                  var valu_select = $('#work_authorization_id').val();
                                 if (valu_select==3) {
                                  $("#work_authorization_id_12").show();
                                 }
                                 else{
                     $("#work_authorization_id_12").show();
                                 }
                      });
						  $('#work_authorization_id').on('change', function() {
						  if(this.value ==3)
						  {
						 
						   $("#work_authorization_id_12").show();
                            $(".re_remove").attr("required", true);
						   
						  }
						  else
						  {
						 $(".re_remove").removeAttr('required');
						   $("#work_authorization_id_12").hide();
                           $("#employer_name").val('');
                           $("#employer_company").val('');
                           $("#employer_email").val('');
                           $("#employer_number").val('');
                           
						  }
						 });
						</script>
                                
                                
                                
                                
                                
                   
                                
                                <script>
			jQuery("#cv").change(function () {
			
			var formData = new FormData($('#theform')[0]);
			
			// alert(formData);
			var name=$("#cv").val();
			$.ajax({
			type: 'POST',      
			url: "view/ajax/upload.php",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			async: true,
			success: function(data) {
			// alert(data);
			$(".Preview").html(data);
			
			}
			}) ;
            
            var src = $('#file_name').attr('src');
			// alert(src);
			var src = src.split("/");
			var file_name= src[src.length-1];
			
			$.ajax({
			type: 'POST',      
			url: "view/ajax/upload_remove.php",
			data: "file_name="+file_name,
			//cache: false,
			//contentType: false,
			// processData: false,
			// async: true,
			success: function(data) {
			//  alert("sfsfs"+data);
			// $(".test").html(data);
			
			}
			}) ;
            
            
            
			});
			
			$("#submit").click(function(){
			
			var src = $('#file_name').attr('src');
			// alert(src);
			var src = src.split("/");
			var file_name= src[src.length-1];
			
			$.ajax({
			type: 'POST',      
			url: "view/ajax/upload_remove.php",
			data: "file_name="+file_name,
			//cache: false,
			//contentType: false,
			// processData: false,
			// async: true,
			success: function(data) {
			//  alert("sfsfs"+data);
			// $(".test").html(data);
			
			}
			}) ;
			});
			
			
			</script>
                                
                                
                                
                          
                                  
                                  
                                  <script>
                                    
                                  $("#add_button").click(function(){
                                    
                                   
                                    lang_field=$("#language").val();
                                    if(lang_field!==""){
                                        
                                        $("#append_language").append("<div class='row'><div class='input col-md-7'><div class='form-group form-md-line-input form-md-floating-label has-success'><input type='text' name='language[]'  value='' class='form-control <?php if($language!=''){echo 'edited'; } ?> language_field'></div></div><div class='input col-md-5'><div class='form-group form-md-line-input form-md-floating-label has-success'><a class='remove_r remove' href='javascript:void(0);'><i class='fa fa-minus-circle'></i> Remove</a></div></div></div>");
                                        
                                        $(".remove_r").click(function (){
                                           
                                           $(this).closest('div[class="row"]').remove();
                                           //$(this).parent().remove();
                                           //$(this).remove();
                                            });
                                    }
                                    });
                                    
                                    function language_remove(val){
                                        
                                        if( confirm('Are you sure you want to Delete?')) {
                                        $(".remove_row_"+val).remove();
                                    }}
                                  </script>
                                
                                
                
<script>
function append_media(){
$len=$('input[name="social_media_url[]"]').length;

 
if($len<=4)
$("#append_media").append('<div class="row" id="media_'+$len+'"><div class="input col-md-4"><div class="form-group form-md-line-input form-md-floating-label has-success"><select class="form-control select2me select2-hidden-accessible"   name="social_media_name[]" id="social_media_name_'+$len+'"><option value="">--Select Social Media Type--</option><option value="facebook">Facebook</option><option value="instagram">Instagram</option><option value="twitter">Twitter</option><option value="google+">Google+</option><option value="linked_in">LinkedIn</option><option value="you_tube">YouTube</option></select></div></div><div class="col-md-4"><div class="form-group form-md-line-input form-md-floating-label has-success"><input type="url" name="social_media_url[]" id="social_media_url_'+$len+'" class="form-control" ><label for="form_control_1">URL</label></div></div><div class="col-md-2"><a class=" remove" onclick="return removeeee_media('+$len+');" href="javascript:void(0);"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></div></div>');
}

function removeeee_media(id){
var val=confirm("You really want to delete it??");
if(val==true)
$("#media_"+id).remove();
else
return false;
}
</script>                   
                        
                        
                        
                        
 
		
<!--<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>-->
<script src="template/js/jquery.mtz.monthpicker.js"></script>
<script>
$('.demo-1').monthpicker();


jQuery(function(){
   
     jQuery(".current").click(function() {

	 //alert("adad");
    jQuery(".current").each(function(){
        jQuery('.current').prop('checked', false);   
      jQuery(".end_date").removeAttr("disabled");
      });
     
   jQuery(this).prop('checked', true);  
  var a1223= jQuery(this).parent().parent().prev().find('input').attr('disabled', 'disabled');
  var a12234= jQuery(this).parent().parent().prev().find('input').val('');
    
     });
});


jQuery(".demo-1").click(function(){
       jQuery(".demo-1").addClass("edited");
    });
//
//function zip_id(id)
//{
//	if(id!==''){
//		
//	
//	//alert(id);
//	jQuery.ajax({
//	url : "view/ajax/get_country_state_city.php",
//	type:"POST",
//	data: "id="+id,
//   success:function(data)
//  {
//	   var res = data.split("||#"); 
//		//alert(res);
//		
//				
//	   $("#city").val(res['0']);
//		$('#city').addClass("edited");
//		
//		$("#country").html(res['1']);
//		//$('#country').addClass("edited");
//		
//		 $("#state").html(res['2']);
//		//$('.state').addClass("edited");
//  }
//  });
//}
//}




function city_name(name)
{
	if(name!==''){
	//alert(name);
	jQuery.ajax({
	url : "view/ajax/get_country_state_city_2.php",
	type:"POST",
	data: "name="+name,
   success:function(data)
  {
	  var res = data.split("||#"); 
	//alert(data);
		
				
	   $("#postal_code").val(res['0']);
		$('#postal_code').addClass("edited");
		
		$("#country").html(res['1']);
		//$('#country').addClass("edited");
		
		 $("#state").html(res['2']);
		//$('.state').addClass("edited");
  }
  });

}
}
   

			   function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$('.alphaonly').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z\s]/g,'') ); }
);

</script>


  <script type="text/javascript">
            // capture camera and/or microphone
            navigator.mediaDevices.getUserMedia({ video: true, audio: true }).then(function(camera) {

                // preview camera during recording
                document.getElementById('your-video-id').muted = false;
                document.getElementById('your-video-id').srcObject = camera;

                // recording configuration/hints/parameters
                var recordingHints = {
                    type: 'video'
                };

                // initiating the recorder
                var recorder = RecordRTC(camera, recordingHints);

                // starting recording here
                recorder.startRecording();

                // auto stop recording after 5 seconds
                var milliSeconds = 5 * 1000;
                setTimeout(function() {

                    // stop recording
                    recorder.stopRecording(function() {
                        
                        // get recorded blob
                        var blob = recorder.getBlob();

                        // generating a random file name
                        var fileName = getFileName('mp4');

                        // we need to upload "File" --- not "Blob"
                        var fileObject = new File([blob], fileName, {
                            type: 'video/mp4'
                        });

                        uploadToPHPServer(fileObject, function(response, fileDownloadURL) {
                            if(response !== 'ended') {
                                document.getElementById('header').innerHTML = response; // upload progress
                                return;
                            }

                            document.getElementById('header').innerHTML = '<a href="' + fileDownloadURL + '" target="_blank" style="display: none;">' + fileDownloadURL + '</a>';

                          //  alert('Successfully uploaded recorded blob.');

                            // preview uploaded file
                            document.getElementById('your-video-id').srcObject = null;
                            document.getElementById('your-video-id').src = fileDownloadURL;

                            // open uploaded file in a new tab
                            window.open(fileDownloadURL);
                        });

                        // release camera
                        document.getElementById('your-video-id').srcObject = document.getElementById('your-video-id').src = null;
                        camera.getTracks().forEach(function(track) {
                            track.stop();
                        });

                    });

                }, milliSeconds);
            });

            function uploadToPHPServer(blob, callback) {
                // create FormData
                var formData = new FormData();
                formData.append('video-filename', blob.name);
                formData.append('video-blob', blob);
                callback('Uploading recorded-file to server.');

              //  var upload_url = 'https://webrtcweb.com/f/';
                 var upload_url = 'https://itcareer.app/candidate-login/RecordRTC-master/RecordRTC-to-PHP/save.php';

               // var upload_directory = upload_url;
                 var upload_directory = 'https://itcareer.app/candidate-login/RecordRTC-master/RecordRTC-to-PHP/uploads/';
                
                makeXMLHttpRequest(upload_url, formData, function(progress) {
                    if (progress !== 'upload-ended') {
                        callback(progress);
                        return;
                    }
                    var initialURL = upload_directory + blob.name;
                    callback('ended', initialURL);
                });
            }

            function makeXMLHttpRequest(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        if (request.responseText === 'success') {
                            callback('upload-ended');
                            return;
                        }
                        alert(request.responseText);
                        return;
                    }
                };
                request.upload.onloadstart = function() {
                    callback('PHP upload started...');
                };
                request.upload.onprogress = function(event) {
                    callback('Your Video Uploaded ' + Math.round(event.loaded / event.total * 100) + "%");
                };
                request.upload.onload = function() {
                    callback('progress-about-to-end');
                };
                request.upload.onload = function() {
                    callback('PHP upload ended. Getting file URL.');
                };
                request.upload.onerror = function(error) {
                    callback('PHP upload failed.');
                };
                request.upload.onabort = function(error) {
                    callback('PHP upload aborted.');
                };
                request.open('POST', url);
                request.send(data);
            }

            // this function is used to generate random file name
            var reg_id = '<?=$reg_id?>';
            function getFileName(fileExtension) {
                var d = new Date();
                var year = d.getUTCFullYear();
                var month = d.getUTCMonth();
                var date = d.getUTCDate();
                return 'RecordRTC-' + year + month + date + '-' + reg_id + '.' + fileExtension;
            }

            function getRandomString() {
                if (window.crypto && window.crypto.getRandomValues && navigator.userAgent.indexOf('Safari') === -1) {
                    var a = window.crypto.getRandomValues(new Uint32Array(3)),
                        token = '';
                    for (var i = 0, l = a.length; i < l; i++) {
                        token += a[i].toString(36);
                    }
                    return token;
                } else {
                    return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');
                }
            }
        </script>

        
        <footer style="margin-top: 20px;"><small id="send-message"></small></footer>
        <script src="https://www.webrtc-experiment.com/common.js"></script>
<script src="https://itcareer.app/candidate-login/RecordRTC-master/RecordRTC.js"></script>