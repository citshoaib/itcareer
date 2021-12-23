<?php
/*if($_SESSION["id"]!='')
{
   $regid= $_SESSION["id"];
}
else*/ if($_REQUEST['reg_id']!=''){
$reg_id=$_REQUEST['reg_id'];
}
else{
   $reg_id=$_REQUEST['id'];
  
}

	$select=mysql_query("select * from sedna_operator_request_consultants_reg where id='$reg_id'");
$fetch=mysql_fetch_array($select);
  $reg_id=$fetch['id'];
  
  $email=$fetch['email'];
  $cv_name=$fetch['cv'];
  
  $select_profile=mysql_query("select * from sebna_profile_tbl where reg_id='$reg_id'");
  $fetch_profile=mysql_fetch_array($select_profile);
  $first_name=$fetch_profile['first_name'];
  $middel_name=$fetch_profile['middel_name'];
  $last_name=$fetch_profile['last_name'];
  $postal_code=$fetch_profile['postal_code'];
  $city=$fetch_profile['city'];
  $phone_no=$fetch_profile['phone_no'];
  $Country=$fetch_profile['country'];
  $state=$fetch_profile['state'];
  $job_title= explode(",",$fetch_profile['job_title']);
 // print_r($job_title);
  $employment_type=explode(",",$fetch_profile['employment_type']);
  $work_authorization=$fetch_profile['work_authorization'];
  $salary=$fetch_profile['salary'];
  $hourly_rate=$fetch_profile['hourly_rate'];
   $experience=$fetch_profile['experience'];
   $position=$fetch_profile['position'];
   $searchable=$fetch_profile['searchable'];
    $relocate=$fetch_profile['relocate'];
	 $security=$fetch_profile['security'];
	 $travel=$fetch_profile['travel'];
	  $preferred_location=$fetch_profile['preferred_location'];
   $employer_name=$fetch_profile['employer_name'];
    $employer_company=$fetch_profile['employer_company'];
     $employer_email=$fetch_profile['employer_email'];
      $employer_number=$fetch_profile['employer_number'];
   
   
?>

<div class="container">
   <div class="row">
<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 bgw pt_10">
     
        <div class="row">
            
            <div class="col-md-6 ">
            <div class="heading"><?php echo ucfirst($first_name)." ".ucfirst($middel_name)." ".ucfirst($last_name); ?></div>
                        </div>
			<div class="col-md-3 ">
			 <div class="act_as"><a   href="../upload_doc/<?php echo $cv_name;?>" download >Download CV</a>  </div>
			</div>
                          <div class="col-md-3 ">
           <div class="fr">
           <a  class="btn btn-default" href="?page=edit&id=<?php echo $reg_id; ?>">
                    <i class="fa fa-edit"></i> Edit Profile
                </a>
           </div>
                        </div>
                        
            </div>
            <hr>
  
        <div class="row">
            
            <div class="col-md-4 ">
           <i class="fa fa-envelope"></i> <?php echo $email; ?>
                        </div>
                          <div class="col-md-3 ">
            <i class="fa fa-phone"></i>  <?php if($phone_no!='') { echo $phone_no; }else {?><a href="?page=edit&id=<?php echo $reg_id; ?>"> Add phone</a> <?php } ?>
                        </div>
                        
                        <div class="col-md-2 ">
            <i class="fa fa-paper-plane-o"></i> <?php echo $postal_code; ?>
                        </div>
                        
                         <div class="col-md-3 ">
                         <div class="fl pall_5">Searchable</div>
                         <div class="fl">
                     <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" <?php if($searchable!='') {echo "checked"; }  ?>>
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div></div>    
            <!--<input name="Searchable" type="radio" value="">--> 
                        </div></div>
                        <br>
                    <div class="row">     
                        
                        
                        <div class="col-md-3 ">
            <i class="fa fa-globe"></i> <?php
			//echo $Country;
           $select_country= mysql_query("select * from country_master where country_code='$Country'");
           $fetch_country=mysql_fetch_array($select_country);
                       echo $fetch_country['country_name']; ?>
                        </div>
						<div class="col-md-3 ">
            <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo ucfirst($state); ?>
                        </div>
						
						<div class="col-md-3 ">
            <i class="fa fa-home"></i> <?php echo ucfirst($city); ?>
                        </div>
						
						
                        
            </div>                
             <hr>
            <div class="row">
              <div class="col-md-12 ">
              <div class="heading">  <?php // $job_title1=$job_title[0];
                echo ucfirst($position);
                ?> </div>
                <?php //print_r($employment_type);
                 count($employment_type);
                for($i=0; $i< count($employment_type);$i++)
                {
                    $id=$employment_type[$i];
               $select_employment_type=mysql_query("select * from sebna_employment_type where id='$id'");
                $fetch_employment_type=mysql_fetch_array($select_employment_type);
				
				 $fetch_employment_type=$fetch_employment_type['employment_type'];
				 if($i!=0)
				 {
						echo ",".$fetch_employment_type;
						
				 }
				 else
				 {
						
						echo $fetch_employment_type;
				 }
                }
                ?>
				<br><a href="" class="act_as">Relocate? <?php echo ($relocate!='')? $relocate: 'No'; ?></a>
				<br> <?php
				if($employer_name!='')
				{
				?>
				<fieldset>
				 <legend>
				<?php
				
				
				$select_work_authorization=mysql_query("select * from sebna_work_authorization where id='$work_authorization'");
				$fetch_work_authorization=mysql_fetch_array($select_work_authorization);
				$fetch_work_authorization1=$fetch_work_authorization['work_authorization'];				
				echo $fetch_work_authorization1; echo ($fetch_work_authorization1!='')?',':''; ?>  <a href="?page=edit&id=<?php echo $reg_id; ?>" class="act_as">Manage Work Authorization</a>
				</legend>
				
				<?php
				if($employer_name!='')
				{
				echo  ucfirst($employer_name)."<br>";
				}
				if($employer_company!=''){
				echo   ucfirst($employer_company)."<br>";
     
				}
				if($employer_email!='')
				{
			echo 	 ucfirst($employer_email)."<br>";
      
				}
				if($employer_number!='')
				{
				 echo $employer_number;
				}
				?>
				 
				</fieldset>
				<?php
				}
				else
				{
				 $select_work_authorization=mysql_query("select * from sebna_work_authorization where id='$work_authorization'");
				$fetch_work_authorization=mysql_fetch_array($select_work_authorization);
				$fetch_work_authorization1=$fetch_work_authorization['work_authorization'];				
				echo $fetch_work_authorization1; echo ($fetch_work_authorization1!='')?',':''; ?>  <a href="?page=edit&id=<?php echo $reg_id; ?>" class="act_as">Manage Work Authorization</a>
				<?php
				}
				?>
				<br><a href="?page=edit&id=<?php echo $reg_id; ?>" class="act_as">Security Clearance? <?php echo ($security!='')? $security: 'No'; ?></a>
				<br><?php if($salary!=''){ echo '$'.$salary.' /yr';} else{ ?> <a href="" class="act_as">Add a Salary</a> <?php } ?>,<?php if($hourly_rate!=''){ echo ' $'.$hourly_rate.' /hr';} else{ ?><a class="act_as" href="">Add an Hourly Rate</a> <?php } ?>
				<?php
				
				$select_work_experience_current=mysql_query("select * from sebna_work_experience where reg_id='$reg_id' && current!=''");
				$fetch_work_experience_current=mysql_fetch_array($select_work_experience_current);
				?>
				<br> Current: <?php echo $fetch_work_experience_current['comapnay']; ?>
				<br> Experience: <?php echo $experience; ?> yr
				<br> I'M Willing To Travel: <?php echo $travel; if($travel!='0' && $travel!=''){ echo  " %";}?>
				<br> Preferred Location : <?php echo ucfirst($preferred_location); ?>
            </div> </div>
			
            <hr>
            <div class="row">
            
            <div class="col-md-12 ">
            <div class="heading">Skills</div>
                        </div>
                         
      <?php  $select_skills=mysql_query("select * from sedna_skills where reg_id='$reg_id'");
				while($fetch_skills=mysql_fetch_array($select_skills))
				{ ?>
				<div class="col-md-6 ">	<?php echo $fetch_skills['skill_name']." ..................".$fetch_skills['year_exp']." year"; ?> </div>	
		<?php 				
				}
	  ?>
	 
      
                        
                        
            </div>
            
                  <div class="row mt_10">
            
            <div class="col-md-12 ">  <a class="btn btn-default btn-lg has-feedback" href="?page=edit&id=<?php echo $reg_id; ?>">Add skill</a></div></div>
            
            <hr>
   
            <div class="row">
            
            <div class="col-md-12 ">
            <div class="heading">Work Experience </div>
                        </div></div>
                        
                        
						 <?php  $select_skills=mysql_query("select * from sebna_work_experience where reg_id='$reg_id'");
				while($fetch_skills=mysql_fetch_array($select_skills))
				{ ?>
            <div class="row">
                         
      				<div class="col-md-6 ">	
                    <div class="col-md-12 mp"><span class="f20"><?php echo ucfirst ($fetch_skills['job_title']); ?></span></div>
                     <div class="col-md-12 mp"> <?php echo ucfirst ($fetch_skills['comapnay']); ?></div> </div>
                 <div class="col-md-6 "><?php echo $fetch_skills['start_date']." - ".$fetch_skills['end_date']. date('m/Y ',$fetch_skills['current'] ); ?> </div>	
  </div>
  <?php 				
				}
	  ?>
				</br>
              <div class="row">
              <div class="col-md-6 "><a class="btn btn-default btn-lg has-feedback" href="?page=edit&id=<?php echo $reg_id; ?>">Add Work Experience </a></div>
              </div> 
            
            
            <hr>
			<div class="row">
            
            <div class="col-md-12 ">
            <div class="heading">Education </div>
                        </div></div>
			
            <?php
			$select_education=mysql_query("select * from sedna_education where reg_id='$reg_id'");
			while($fetch_education=mysql_fetch_array($select_education))
			{
			
			?>
            
			
			 
            <div class="row">
            
            <div class="col-md-12 ">
            <div class="heading"><?php
			$education=$fetch_education['education'];
			$edu_master=mysql_query("select * from sedna_education_master where id='$education'");
			$fetch_edu_master=mysql_fetch_array($edu_master);
			echo  $fetch_edu_master['education_type'].', '.ucfirst ($fetch_education['institution']); ?> </div>
                        </div>
                        </div>
                        
                       <div class="row"> 
                        <div class="col-md-12 "><span class="f20"><?php echo ucfirst ($fetch_education['city']); ?></span>
                        <br />
                        <?php echo ucfirst ($fetch_education['country']); ?>
						<br />
                        <?php echo ucfirst ($fetch_education['year']); ?>
						</div>
                     
            </div>
            
            <br />
			<?php
			}
			?>
            <div class="row"> <div class="col-md-12 ">
      
        <a class="btn btn-default btn-lg has-feedback" href="?page=edit&id=<?php echo $reg_id; ?>">Education</a>
                        </div> </div>
                        
                        
            <hr>
            
            
            
                         
            
            </div>
            </div>     </div>