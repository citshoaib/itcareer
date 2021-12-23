<?php
@session_start();
// retrieve session data
if(!$_SESSION["employer_email"]){
header('location:?page=login');
}
?>

<div class="container content mtb">

<div class="row ">
<div class="col-lg-12">
<h3 class="block-head">Job Applications</h3>
</div>
</div>

<div class="res_tab">
<table id="" class="table" > 
<thead>
    <tr>
        <th><h4>S. No</h4></th>
        <th><h4>Job Title</h4></th>
        <th><h4>Candidate Details</h4></th>
        <th><h4>Job Details</h4></th>
    </tr>

</thead>

<tbody>
    
    <?php
    $kl=1;
	$rows='10';
if(isset($_GET['page_no'])){
$page_no=$_GET['page_no'];
}else{
$page_no=1;	
}
$first_page=$rows*($page_no-1);
 $limit ="limit $first_page,$rows ";
  $i = $limit*($page-1)+1;
  
  $select_jobs = mysql_query("SELECT * FROM apply_jobs INNER JOIN sedna_job_form ON apply_jobs.jobid=sedna_job_form.id where sedna_job_form.employer_id='".$_SESSION['employer_id']."' ORDER BY apply_jobs.id DESC $limit") or die(mysql_error());
  $pagination_sql = ("SELECT * FROM apply_jobs INNER JOIN sedna_job_form ON apply_jobs.jobid=sedna_job_form.id where sedna_job_form.employer_id='".$_SESSION['employer_id']."' ORDER BY apply_jobs.id DESC ");
while($row_1=mysql_fetch_array($select_jobs))
{
    $cv_name=$row_1['cv'];
  ?>
    <tr class="gradeA">
        <td><?php echo $kl; ?></td>
        <td><?php echo ucwords($row_1['job_title']);?></td>
        <td>
            <a href="15" class="btn btn-default btn-sm btn-icon btn-primary1 " onclick="return hs.htmlExpand(this , {width:600})">View Details</a>
            <div class="highslide-maincontent" style="margin:5px;">
                 <table class="table table-striped" width="50%" cellpadding="10">
            <?php
            $candidate_query = mysql_query("SELECT * FROM sedna_user_registration_tbl where master_id='".$row_1['candidate_id']."'") or die(mysql_error());
            $row=mysql_fetch_array($candidate_query);
            $reg_id = $row_1['candidate_id'];
  $email=$row['email'];
            
 
 
            $select1=mysql_query("select * from sebna_profile_tbl where reg_id='$reg_id'");
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
                
                $country_details = mysql_query("SELECT * FROM country_master where country_code='$country1'") or die(mysql_error());
                $country_fetch = mysql_fetch_array($country_details);
                
                $address = $postal_code.','.ucwords($city).','.ucwords($state).','.ucwords($country_fetch['country_name']);
                
                
                if($profile_image !=''){
            ?>
            <tr>
				  <td>Profile Image</td>
                  <td> <img id='logo' src='../candidate-login/upload_doc/profile_picture/<?php echo $profile_image; ?>' height='50' width='50' alt="no image avail"/></td>
			</tr>
            <?php  } ?>
            
            <tr>
				  <td>Name</td>
                  <td><?php echo $candidate_name;?></td>
			</tr>
            
            <tr>
				  <td>Email</td>
                  <td><?php echo $email;?></td>
			</tr>
            
            <tr>
				  <td>Contact Number</td>
                  <td><?php echo $phone;?></td>
			</tr>
            
            <tr>
				  <td>Address</td>
                  <td><?php echo $address;?></td>
			</tr>
            
            <tr>
				  <td>Resume</td>
                  <td><a class="btn btn-warning" href="../upload_doc/<?php echo $cv_name;?>" download>Download Resume</a></td>
			</tr>
            
            <tr>
                <td>Miscellaneous Information</td>
                <td>
                    
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
				<!--<br><a href="?page=edit&id=<?php echo $reg_id; ?>" class="act_as">Relocate? <?php echo ($relocate!='')? $relocate: 'No'; ?></a>-->
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
				echo $fetch_work_authorization1; echo ($fetch_work_authorization1!='')?',':''; ?>
               <!-- <a href="?page=edit&id=<?php echo $reg_id; ?>" class="act_as">Manage Work Authorization</a>-->
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
				echo $fetch_work_authorization1; echo ($fetch_work_authorization1!='')?',':''; ?>
                <!--<a href="?page=edit&id=<?php echo $reg_id; ?>" class="act_as">Manage Work Authorization</a>-->
				<?php
				}
				?>
				<!--<br><a href="?page=edit&id=<?php echo $reg_id; ?>" class="act_as">Security Clearance? <?php echo ($security!='')? $security: 'No'; ?></a>-->
				<br><?php if($salary!=''){ echo '$'.$salary.' /yr';} else{ ?>
                N/A
                <!--<a href="" class="act_as">Add a Salary</a>--> <?php } ?>,
                <?php if($hourly_rate!=''){ echo ' $'.$hourly_rate.' /hr';} else{ ?>
                N/A
                <!--<a class="act_as" href="">Add an Hourly Rate</a>--> <?php } ?>
				<?php
				
				$select_work_experience_current=mysql_query("select * from sebna_work_experience where reg_id='$reg_id' && current!=''");
				$fetch_work_experience_current=mysql_fetch_array($select_work_experience_current);
				?>
				<br> Current: <?php echo $fetch_work_experience_current['comapnay']; ?>
				<br> I'M Willing To Travel: <?php echo $travel; if($travel!='0' && $travel!=''){ echo  " %";}?>
				<br> Preferred Location : <?php echo ucfirst($preferred_location); ?>
                    
                </td>
            </tr>
            
            <tr>
                <td>Work Experience</td>
                <td>
                    <?php  $select_skills=mysql_query("select * from sebna_work_experience where reg_id='$reg_id'");
				while($fetch_skills=mysql_fetch_array($select_skills))
				{ ?>
        <p class="mb0"><strong><?php echo ucfirst ($fetch_skills['job_title']); ?></strong></p>
        <p><?php echo ucfirst ($fetch_skills['comapnay']); ?></p>
        <p><?php echo $fetch_skills['start_date']." - ".$fetch_skills['end_date']. date('m/Y ',$fetch_skills['current'] ); ?></p>
        <br>
        <?php } ?>
                </td>
            </tr>
            
            <tr>
                <td>Skills</td>
                <td>
                    <?php  $select_skills=mysql_query("select * from sedna_skills where reg_id='$reg_id'");
				while($fetch_skills=mysql_fetch_array($select_skills))
				{ ?>
         <button type="button" class="btn"><?php echo $fetch_skills['skill_name']; ?></button>
         <?php } ?>
                </td>
            </tr>
            
            
                 </table>
            </div>            
        </td>
        
        <td>
           <a href="15" class="btn btn-default btn-sm btn-icon btn-primary1 " onclick="return hs.htmlExpand(this , {width:600})">View Details</a> 
        <div class="highslide-maincontent" style="margin:5px;">
                 <table class="table table-striped" width="50%" cellpadding="10">
                    <?php
                    $jobs_query = mysql_query("SELECT * FROM sedna_job_form where id='".$row_1['jobid']."'") or die(mysql_error());
                    $fectch_jobs = mysql_fetch_array($jobs_query);
                    ?>
                    <tr>
                        <td>Job Title</td>
                        <td><?php echo $fectch_jobs['job_title'];?></td>
                    </tr>
                    
                    <tr>
                        <td>Salary</td>
                        <td><?php echo $fectch_jobs['salary_from'].' - '.$fectch_jobs['salary_to'];?></td>
                    </tr>
                    
                    <tr>
                        <td>Job Type</td>
                        <td><?php echo ucwords($job_type=str_replace("_"," ",$fectch_jobs['job_type']));?></td>
                    </tr>
                    
                    <tr>
                        <td>Eligibility</td>
                        <td><?php echo $fectch_jobs['eligibility'];?></td>
                    </tr>
                    
                    <tr>
                        <td>Job Location</td>
                        <td><?php echo ucwords($fectch_jobs['location']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Opening Date</td>
                        <td><?php echo date('d-M-Y',$fectch_jobs['opening_date']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Closing Date</td>
                        <td><?php echo date('d-M-Y',$fectch_jobs['closing_date']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Company Name</td>
                        <td><a target="_blank" href="<?php echo $fectch_jobs['company_url'];?>"><?php echo ucwords($fectch_jobs['company_name']);?></a></td>
                    </tr>
                    
                    <tr>
                        <td>Category</td>
                        <td><?php echo ucwords($fectch_jobs['category']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Entry Date</td>
                        <td><?php echo date('d-M-Y',$fectch_jobs['entry_date']);?></td>
                    </tr>
                    
                    <tr>
                        <td>Description</td>
                        <td><?php echo $fectch_jobs['description'];?></td>
                    </tr>
                    
                 </table>
        </div>        
        </td>

    </tr>
    <?php
    $kl++;
    }
    ?>
</tbody>
</table>

<div class="pagination">
<?php
$per_page_block = 10;
if(isset($_GET['page_no'])){
$get_current_page = $_GET['page_no'];
if($get_current_page <4){
$start_loop = 1;
$end_loop = 10;
}
else
{
$start_loop = $get_current_page-4;
$end_loop = $get_current_page+5;
}


}

//	$query=mysql_query("select * from customer");
$query=mysql_query($pagination_sql);
$total_rows=mysql_num_rows($query);
$total_page=ceil($total_rows/$rows);
//	echo $start_loop."--".$end_loop;
if($end_loop>$total_page){
$end_loop = $total_page;
}


$previous = $get_current_page-1;
?>
<ul>
<?
if($previous > 1)
{
echo "<li><a href='?page=job_application&page_no=".$previous."'>Previous</a></li>";
}
if($start_loop>1){
echo "<li><a href='?page=job_application&page_no=1'>1 </a></li>";
echo "<li><a href='#'>...</a>";
}
for($i=$start_loop;$i<=$end_loop;$i++){
echo "<li><a href='?page=job_application&page_no=".$i."'>".$i."  "."</a></li>";	
}
$remain_pages = $total_page- $end_loop;
if($remain_pages>1){
echo "<li><a href='#'>...</a></li>";
}
if($remain_pages>0){
echo "<li><a href='?page=job_application&page_no=$total_page'>".$total_page."</a></li>";
}

$next_page = $_GET['page_no']+1;
if($next_page <= $total_page){ 
echo "<li><a href='?page=job_application&page_no=".$next_page."'>Next</a></li>";	
}

?>

</div>						






</div>


</div></div>



<div class="container">
</div>