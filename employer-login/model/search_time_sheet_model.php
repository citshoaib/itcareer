
<?php
require_once('../../config/config.php');
require_once('../../config/function.php');
$search = $_REQUEST['search'];

           $i = 1;
           $month = mysql_query("SELECT * FROM `emp_week_date_rang` ");
           
           $path = "../upload/";
           //$fetch_year = mysql_fetch_array($year)
           
           ?>
           <table class="table table-striped">
							
								<tr>
									<th>S.no.</th>
                                    <th>Employee Name</th>
									<th>Week</th>
									<th>Year</th>
									<th>Month</th>
                                    <th>Download</th>
                                    <th>Delete</th>
								</tr>
							
							
                                <?php
                                while($fetch_year = mysql_fetch_array($month)){?>
                                    
                                <tr>
                                    <td><?php echo $i;  ?></td>
                                    <td><?php echo $fetch_year['emp_name'];   ?></td>
                                    <td><?php echo $fetch_year['weeks'];   ?></td>
                                    
                                    <?php
                                   // echo"SELECT * FROM `month_year_weeks_tbl` WHERE month = '".$fetch_year['weeks']."' AND year = '".$fetch_year['year']."'";
                                    $year = mysql_query("SELECT * FROM `month_year_weeks_tbl` WHERE id = '".$fetch_year['weeks']."'");
                                    while($month_show = mysql_fetch_array($year)){
                                    ?>
                                    <td><?php echo $month_show['year'];   ?></td>
                                    <td><?php echo $month_show['month']; }  ?></td>
                                    <td><a href="<?php echo $path.$fetch_year['file_name'];  ?>">Download</a></td>
                                    <td><a href="?page=model/delete_file_model.php&id=<?php echo $fetch_year['id'];?>" onclick="return confirm('Do you really want to delete it ?')">Delete</a></td>
                                    
                                </tr>
                                
								
								
							
						</table>
            <?php $i++;}




        $message="";
		$type="File delete successfully";
		SetMessage($message,$type);
		$location="../?page=view_time_sheet";
		redirect($location);



?>