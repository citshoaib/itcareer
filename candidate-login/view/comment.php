
 <?php
// retrieve session data
if(!$_SESSION["candidate_email"]){
	  header('location:?page=login');
}
?>
<?php
  $consultant_id=$_REQUEST['id'];
 $oprater_id= $_SESSION["candidate_id"];
//  SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
//FROM Orders
//INNER JOIN Customers
//ON Orders.CustomerID=Customers.CustomerID; 
 
 
$select=mysql_query("select a.id,a.operator_id,a.email,b.first_name,b.middel_name,b.last_name from sedna_operator_request_consultants_reg a left join sebna_profile_tbl b on a.id=b.reg_id where a.id=$consultant_id");
$fetch=mysql_fetch_array($select);
$email= $fetch['email'];
 $first_name=$fetch['first_name'];
 $middel_name=$fetch['middel_name'];
 $last_name=$fetch['last_name'];
 
   $consultant_id=$fetch['id'];
 $full_name=$first_name.' '.$middel_name.' '.$last_name;

?>


<div class="container">
<hr>
</div>

<div class="container content">
    

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Add / View comments</h3>
         <div class="res_tab">
        <div class="col-lg-12 bg">
            <h4 style="color: #F78F1E;"><?php
            echo $full_name." (".$email.")";
            ?></h4>
          <?php
		 
		  $select_data=mysql_query("select * from sedna_comment_table where consultant_id=$consultant_id order by id desc");
            while($fetch_data=mysql_fetch_array($select_data))
            { ?>
            <div class="mb_10">
                	
    <fieldset>
    <legend>
    <?php
     $oprater_id_2= $fetch_data['oprater_id'];
	 
	 if($oprater_id_2!='')
	 {
     $select_oprater= mysql_query("select * from sedna_user_registration_tbl where id=$oprater_id_2");
     $fetch_oprater=mysql_fetch_array($select_oprater);
   //echo   ucfirst($fetch_oprater['name']).', '.date('d-m-Y',$fetch_data['date']);
   
     echo   ucfirst($fetch_oprater['name']).'-'.'('.$fetch_oprater['department'].')'.', '.date('d-m-Y',$fetch_data['date']);
	 }
	  else
	 {
	 
   echo   ucfirst("Admin").', '.date('d-m-Y',$fetch_data['date']);
	  
	 }
            ?></legend>
     <?php
               echo $fetch_data['comment'];
            ?>
  </fieldset>
                  
          </div>  
         <?php    
            }
          ?>
          
        </div>
    </div>
         
         <br>
         
         
           
             <div class="res_tab">
<form id="theform" name="randform" method="post" action="model/comment_model.php" enctype="multipart/form-data">
                        <table width="50%" cellpadding="10" class="table table-striped">
                            <tbody>
							<tr>
							  <td>Comment:</td>
							  <td>
                                <input type="hidden" name="oprater_id" value="<?php echo $oprater_id; ?>" >
                                <input type="hidden" name="consultant_id" value="<?php echo $consultant_id; ?>" >
                                <textarea name="comment" rows="5" style="width:50%";  cols="30" placeholder="write your comment..."></textarea><br><br>
							    <input type="submit"  value="Submit" class="btn  btn-primary" name="submit">
							  </td>
							</tr>
							
							<tr id="submit">
							  <td></td>
							  <td>
							</td></tr>
                        </tbody></table>
					
                    </form>  </div>    
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
            </div>


</div></div>

					
					

