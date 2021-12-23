<?php
 if($_REQUEST['id']!=''){
     $reg_id=$_REQUEST['id'];
}


	$select=mysql_query("select * from sedna_operator_request_consultants_reg where id='$reg_id' && delete_status='0'");
$fetch=mysql_fetch_array($select);
 
 $consultants_id=$fetch['id'];
 $cv_name=$fetch['cv'];
   $status=$fetch['status'];
   if($status!='1')
{
 //echo "status_0";
   
 
  $select_profile=mysql_query("select * from sedna_operator_request_consultants where consultant_id='$consultants_id' && status='0'");
  $fetch_profile=mysql_fetch_array($select_profile);
  $new_value=$fetch_profile['new_value'];
  
  $new_value_array=unserialize($new_value);
//var_export($original_array);

     //echo "<pre>";print_r($new_value_array);
//
//array_pop($new_value_array);
//echo "<pre>";
//print_r($new_value_array);




if(!is_array($new_value_array[first_name]))
{
   $first_name= $new_value_array[first_name];
  
}
if(!is_array($new_value_array[middel_name]))
{
   $middle_name= $new_value_array[middel_name];
  
}


if(!is_array($new_value_array[last_name]))
{
   $last_name= $new_value_array[last_name];
  
}

if(!is_array($new_value_array[email]))
{
   $email= $new_value_array[email];
  
}
if(!is_array($new_value_array[phone_no]))
{
  $phone_no=  $new_value_array[phone_no];
  
}


if(!is_array($new_value_array[postal_code]))
{
   $postal_code= $new_value_array[postal_code];
  
}
 if(!is_array($new_value_array[city]))
{
   $city= $new_value_array[city];
  
}
 if(!is_array($new_value_array[country]))
{
   $Country= $new_value_array[country];
  
}

 if(!is_array($new_value_array[state]))
{
   $state= $new_value_array[state];
  
}


if(!is_array($new_value_array[experience]))
{
   $experience =  $new_value_array[experience];
  
}

if(!is_array($new_value_array[position]))
{
    $position =  $new_value_array[position];
  
}

if(!is_array($new_value_array[preferred_location]))
{
    $preferred_location =  $new_value_array[preferred_location];
  
}

if(!is_array($new_value_array[salary]))
{
   $salary =  $new_value_array[salary];
  
}

if(!is_array($new_value_array[relocate]))
{
   $relocate =  $new_value_array[relocate];
  
}

if(!is_array($new_value_array[searchable]))
{
   $searchable =  $new_value_array[searchable];
  
}
if(!is_array($new_value_array[security]))
{
   $security =  $new_value_array[security];
  
}

if(!is_array($new_value_array[hourly_rate]))
{
   $hourly_rate =  $new_value_array[hourly_rate];
  
}


 if(!is_array($new_value_array[employment_type]))
{
 
  
}
else
{
 
   $employment_type=  $new_value_array[employment_type];
  
}

if(!is_array($new_value_array[work_authorization]))
{
  $work_authorization=  $new_value_array[work_authorization];
  
}

if(!is_array($new_value_array[travel]))
{
  $travel=  $new_value_array[travel];
  
}


if(!is_array($new_value_array[job_title]))
{
 
  
}
else
{
 
   $job_title=  $new_value_array[job_title];
   

  
}

if(!is_array($new_value_array[comapnay]))
{
 
  
}
else
{
 
   $comapnay=  $new_value_array[comapnay];
    $Current_cmp= $comapnay;
	
	
   
 
  
}
if(!is_array($new_value_array[start_date]))
{
 
  
}
else
{
 
   $start_date = $new_value_array[start_date];
   

  
}
if(!is_array($new_value_array[end_date]))
{
 
  
}
else
{
 
   $end_date=  $new_value_array[end_date];
   
 
  
}

if(!is_array($new_value_array[current]))
{
 
  
}
else
{
 
  $current=  $new_value_array[current];
   
 
  
}





if(!is_array($new_value_array[skill_name]))
{
 
  
}
else
{
 
   $skill_name=  $new_value_array[skill_name];
   
}


if(!is_array($new_value_array[year_exp]))
{
 
  
}
else
{
 
   $year_exp=  $new_value_array[year_exp];

  
}
if(!is_array($new_value_array[education_type]))
{
 
  
}
else
{
 
   $education_type12=  $new_value_array[education_type];
  // print_r($education_type12);
  //  count($education_type12);

  
}
if(!is_array($new_value_array[institution]))
{
 
  
}
else
{
 
   $institution=  $new_value_array[institution];
  // print_r($institution);
  // echo count($institution);

  
}
if(!is_array($new_value_array[edu_city]))
{
 
  
}
else
{
 
   $edu_city=  $new_value_array[edu_city];
 //  print_r($edu_city);
   // count($edu_city);

  
}
if(!is_array($new_value_array[edu_country]))
{
 
  
}
else
{
 
   $edu_country=  $new_value_array[edu_country];
  // print_r($edu_country);
   // count($edu_country);

  
}
  if(!is_array($new_value_array[edu_year]))
{
 
  
}
else
{
 
   $edu_year=  $new_value_array[edu_year];
   //print_r($edu_country);
  // echo count($edu_country);

  
}

if(!is_array($new_value_array[employer_name]))
{
   $employer_name=  $new_value_array[employer_name];
  
}
if(!is_array($new_value_array[employer_company]))
{
   $employer_company=  $new_value_array[employer_company];
  
}
if(!is_array($new_value_array[employer_email]))
{
   $employer_email=  $new_value_array[employer_email];
  
}
if(!is_array($new_value_array[employer_number]))
{
   $employer_number=  $new_value_array[employer_number];
  
}




   }
   
   else{
	
	 $email=$fetch['email'];
	  $cv_name=$fetch['cv'];
	$select1_profile=mysql_query("select * from sebna_profile_tbl where reg_id='$reg_id'");
$fetch1=mysql_fetch_array($select1_profile);
 $first_name=$fetch1['first_name'];
 $middle_name=$fetch1['middel_name'];
  $last_name=$fetch1['last_name'];
  $postal_code=$fetch1['postal_code'];
  $state=$fetch1['city'];
   $city=$fetch1['state'];
  $phone_no=$fetch1['phone_no'];
  $Country=$fetch1['country'];
  $position=$fetch1['position'];
   $experience=$fetch1['experience'];
   $travel=$fetch1['travel'];
  $job_title= explode(",",$fetch1['job_title']);
 // print_r($job_title);
  $employment_type=explode(",",$fetch1['employment_type']);
  $work_authorization=$fetch1['work_authorization'];
  $salary=$fetch1['salary'];
  $hourly_rate=$fetch1['hourly_rate'];
   $searchable=$fetch1['searchable'];
    $relocate=$fetch1['relocate'];
	 $security=$fetch1['security'];
	  $preferred_location=$fetch1['preferred_location'];
   $employer_name=$fetch1['employer_name'];
    $employer_company=$fetch1['employer_company'];
     $employer_email=$fetch1['employer_email'];
      $employer_number=$fetch1['employer_number'];
 
  $select_work=mysql_query("select * from sebna_work_experience where reg_id='$reg_id'");
  $tete = [];
				while($fetch_work=mysql_fetch_array($select_work))
				{
				 
				//echo"<pre>";  print_r($fetch_work);
				$tete["job_title"] = $fetch_work["id"];
				 //$test=serialize($fetch_work);
				
				
				
				}
		
	
	
	
   }
   
?>

<div class="container">
   <div class="row">
<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 bgw pt_10">
     
        <div class="row">
            
            <div class="col-md-6 ">
            <div class="heading"><?php echo ucfirst($first_name)." ".ucfirst($middle_name)." ".ucfirst($last_name); ?></div>
                     
					    </div>
			<div class="col-md-3 ">
			 <?php
			 
			$select_upload_temp= mysql_query("select * from sedna_temp_upload where consultant_id='$reg_id'");
			if(mysql_num_rows($select_upload_temp)>0)
		 {
		  $fetch_upload_temp= mysql_fetch_array($select_upload_temp);
		  $cv_name=  $fetch_upload_temp['cv'];
		 if($cv_name!='')
		 {
		  ?>
		  
		  <div class="act_as"><a download href="../upload_doc/<?php echo $cv_name;?>"  >Download CV</a>  </div>
		
		<?php
		 }
		 }
		 else{
	
			 ?>
			 
			<div class="act_as"><a download href="../upload_doc/<?php echo $cv_name;?>" >Download CV</a>  </div>
			<?php
		 }
			?>
			
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
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch"  <?php if($searchable!=''){ echo "checked"; } ?>>
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
			echo $Country;
			
          /* $select_country= mysql_query("select * from country_master where country_code='$Country'");
           $fetch_country=mysql_fetch_array($select_country);
                       echo  $fetch_country['country_name']; */?>
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
              <div class="heading">  <?php  //$job_title1=$job_title[0];
                echo ucfirst($position);
                ?> </div>
                <?php //print_r($employment_type);
                // count($employment_type);
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
				<br><a href="?page=edit&id=<?php echo $reg_id; ?>" class="act_as">Relocate? <?php echo ($relocate!='')? $relocate: 'No'; ?> </a>
				<br>
				<?php
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
				<br><?php if($salary!=''){ echo '$'.$salary.' /yr';} else{ ?> <a href="?page=edit&id=<?php echo $reg_id; ?>" class="act_as">Add a Salary</a> <?php } ?>,<?php if($hourly_rate!=''){ echo ' $'.$hourly_rate.' /hr';} else{ ?><a href="" class="act_as">Add an Hourly Rate</a> <?php } ?>
				<?php
			   
				$select_work_experience_current=mysql_query("select * from sebna_work_experience where reg_id='$reg_id' && current!=''");
				$fetch_work_experience_current=mysql_fetch_array($select_work_experience_current);
				$Current_cmp=$fetch_work_experience_current['comapnay'];
				if($Current_cmp!='')
				{
				?>
			   
				<br> Current: <?php echo $Current_cmp; ?>
				<?php
				}
				?>
				<br> Experience: <?php echo $experience; if($experience!=''){ echo " yr"; } ?>  
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
				{
				 $fetch_skills['id'];
				?>
				
				<div class="col-md-6 "><div class="col-md-12 "> <span class="f20">	<?php echo $fetch_skills['skill_name']." ..................".$fetch_skills['year_exp']." year"; ?></span></div> </div>	
				
				<?php
				
				}
	
		  for($sk=0;$sk<count($skill_name);$sk++)
				{
				 if($skill_name[$sk]!=''&& $year_exp[$sk]!='')
				 {
				 ?>
				
				<div class="col-md-6 ">	<div class="col-md-12 "> <span class="f20"><?php echo $skill_name[$sk]." ..................".$year_exp[$sk]." year"; ?> </span></div></div>	
		<?php
				 }
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
                        
                        
						 <?php  $select_work=mysql_query("select * from sebna_work_experience where reg_id='$reg_id'");
				while($fetch_work=mysql_fetch_array($select_work))
				{
				 ?>
			<div class="row">
                         
      				<div class="col-md-6 ">	
                    <div class="col-md-12 mp"><span class="f20"><?php echo ucfirst ($fetch_work['job_title']); ?></span></div>
                     <div class="col-md-12 mp"> <?php echo ucfirst ($fetch_work['comapnay']); ?></div> </div>
                 <div class="col-md-6 "><?php echo $fetch_work['start_date']." - ".$fetch_work['end_date'].date('m/Y ',$fetch_work['current'] );?> </div>	
  </div>	 
				 
				 <?php
				}
				 
				 
				  for($wk=0; $wk<count($job_title); $wk++)
				  {
				   if($job_title[$wk]!='')
                      {
					   
					// echo $current[$wk];
				  
				  ?>
				
				
				
            <div class="row">
                         
      				<div class="col-md-6 ">	
                    <div class="col-md-12 mp"><span class="f20"><?php echo ucfirst ($job_title[$wk]); ?></span></div>
                     <div class="col-md-12 mp"> <?php echo ucfirst ($comapnay[$wk]); ?></div> </div>
                 <div class="col-md-6 "><?php echo $start_date[$wk]." - ".$end_date[$wk]; if($end_date[$wk]==''){ echo date('m/Y ',$current[$wk]);} ?> </div>	
  </div>
  <?php 				
				}
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
				{ ?>
			 <div class="row">
            <div class="col-md-6 ">
            <div class="col-md-12 mp">
			 <span class="f20">
            <?php
			//$education=$fetch_education['education'];
			$edu_master=mysql_query("select * from sedna_education_master where id='".$fetch_education['education']."'");
			$fetch_edu_master=mysql_fetch_array($edu_master);
			echo  $fetch_edu_master['education_type'].', '.ucfirst ($fetch_education['institution']); ?></span> </div>
			</div>
                       
                        </div>
                        
                       <div class="row">
						<div class="col-md-6 ">
                        <div class="col-md-12 "><span class="f20"><?php echo ucfirst ($fetch_education['city']); ?></span>
                        <br />
                        <?php echo ucfirst ($fetch_education['country']); ?>
						<br />
                        <?php echo ucfirst ($fetch_education['year']); ?>
						</div>
						</div>
                     
            </div>
			<br>
			
			<?php	}
			
			for($edu=0;$edu<count($education_type12);$edu++)
			{
			if($education_type12[$edu]!='')
                      {
			?>
            
			
			 
            <div class="row">
            
            <div class="col-md-12 ">
            <div class="heading"><?php
			//$education=$fetch_education['education'];
			$edu_master=mysql_query("select * from sedna_education_master where id='$education_type12[$edu]'");
			$fetch_edu_master=mysql_fetch_array($edu_master);
			echo  $fetch_edu_master['education_type'].', '.ucfirst ($institution[$edu]); ?> </div>
                        </div>
                        </div>
                        
                       <div class="row"> 
                        <div class="col-md-12 "><span class="f20"><?php echo ucfirst ($edu_city[$edu]); ?></span>
                        <br />
                        <?php echo ucfirst ($edu_country[$edu]); ?>
						<br />
                        <?php echo ucfirst ($edu_year[$edu]); ?>
						</div>
                     
            </div>
            
            <br />
			<?php
			}
			}
			?>
            <div class="row"> <div class="col-md-12 ">
      
        <a class="btn btn-default btn-lg has-feedback" href="?page=edit&id=<?php echo $reg_id; ?>">Add Education</a>
                        </div> </div>
                        
                        
            <hr>
            
            
            
                         
            
            </div>
            </div>     </div>