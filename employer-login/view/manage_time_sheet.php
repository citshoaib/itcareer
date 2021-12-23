
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
 <?php
// retrieve session data
require_once('../config/function.php');
if(!$_SESSION["employer_email"]){
	//  header('location:?page=login');
	  $location="?page=?page=login";
		redirect($location);
}
?>
<div class="container">
<hr>
</div>

<div class="container">

<div class="row ">
            <div class="col-lg-12">
           
		    

 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">View Time Sheet</a></li>
    
   
  </ul>
  <div id="tabs-1">
	<form action="model/time_sheet_search.model.php" method="post">
	 <?php
           $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'Jun.', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
                       
           ?>
					
                    Select Month: <select name="month" id="month" required>
					 <option selected disabled value="">Select...</option>
                                        <?php
                                            foreach ($months as $num => $name) {
                                                printf('<option value="'.$num.'">'.$name.'</option>', $num, $name);
                                            }
                                            
                                        ?>
                                 </select>
                    Select Year : <select name="year" id="year" required>
					 <option selected disabled value="">Select...</option>
                    <?php
                            $firstYear = (int)date('Y') - 35;
                            $lastYear = $firstYear + 70;
                            echo '';
                            for($i=$firstYear;$i<=$lastYear;$i++)
                            {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                             ?>
					
					
					
					
					
                               </select>
					Employee Name:<select name="name" >
					  <option selected disabled value="">Select...</option>
					  <?php
					  $emp_name = mysql_query("SELECT * FROM `user_registration_tbl`");
					  
					  while($name_emp = mysql_fetch_array($emp_name)){
					  
					  ?>
					  <option value="<?php echo $name_emp['name'];?>"><?php echo $name_emp['name'];?></option>
					  <?php  }?>
					</select>
					<input type="submit" name="submit" id="Submit" value="Search" /><br>
					</form>
    <?php   $name_e= $_REQUEST['name'];
	        $year_e = $_REQUEST['year'];
	        $month_e= $_REQUEST['month'];
           $i = 1;
		  
		  
		  if($year_e=='' OR $month_e==''){
			//echo"SELECT * FROM `emp_week_date_rang`";
			$month = mysql_query("SELECT * FROM `emp_week_date_rang`");
		  }else{
			//echo "SELECT * FROM `emp_week_date_rang` where emp_name = '$name_e' OR month = '$month_e' AND year = '$year_e'";
			$month = mysql_query("SELECT * FROM `emp_week_date_rang` where emp_name = '$name_e' OR month = '$month_e' AND year = '$year_e'");
		  }
           
           $path = "../upload/";
           //$fetch_year = mysql_fetch_array($year)
           		 
           ?>
		   
		   <table id="example" >
						<thead>	
								<tr>
									<td><h4>S no.</h4></td>
									<td><h4>Employee Name</h4></td>
									<td><h4>Year</h4></td>
									<td><h4>Month</h4></td>
									<td><h4>Week</h4></td>
									
                                    <td><h4>Download</h4></td>
									<td><h4>Delete</h4></td>
									
								</tr>
								</thead>
							<tbody>
							
                                <?php
								if($name_e=='' OR $year_e =='' OR $month_e==''){
                                while($fetch_year = mysql_fetch_array($month)){ //print_r($fetch_year); ?>
                                    
                                <tr>
                                    <td><?php echo $i;  ?></td>
                                    <td><?php echo $fetch_year['emp_name'];   ?></td>
									<td><?php echo $fetch_year['year'];   ?></td>
                                    <td><?php echo $fetch_year['month'];  ?></td>
									<?php
                                   // echo"SELECT * FROM `month_year_weeks_tbl` WHERE month = '".$fetch_year['weeks']."' AND year = '".$fetch_year['year']."'";
                                    $year = mysql_query("SELECT * FROM `month_year_weeks_tbl` WHERE id = '".$fetch_year['weeks']."'");
                                    while($month_show = mysql_fetch_array($year)){
                                    ?>
									<td><?php echo $month_show['weeks'];  } ?></td>
                                    
                                    <td><a href="<?php echo $path.$fetch_year['file_name'];  ?>"  class="btn-success  btn-sm btn-icon">Download</a></td>
                                    <td><a href="model/delete_file_model.php?id=<?php echo $fetch_year['id'];?>" onclick="return confirm('Do you really want to delete it ?')" class="btn-danger btn-sm btn-icon">Delete</a></td>
                                    
                                </tr>
                               
						
            <?php $i++;}}?>
			</tbody>
		   </table>
		   
  </div>
  <div id="tabs-2">
    
  </div>
  
</div>
           
            </div>


</div></div>
