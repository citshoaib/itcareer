 <?php
// retrieve session data
if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
 $_SESSION['employer_id'];
?>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
//      google.charts.load('current', {'packages':['bar']});
//      google.charts.setOnLoadCallback(drawStuff);
//
//
//      function drawStuff() {
//        var data = new google.visualization.arrayToDataTable([
//          ['Move', 'Total'],
//		   <?php
//		
//		$select_consultants1=mysql_query("select distinct skill_name from  sedna_skills");
//		//$bhjbdsjd = mysql_num_rows($select_consultants1);
//		while($fetch=mysql_fetch_array($select_consultants1))
//		{
//			
//		 $skil=$fetch['skill_name'];
//		
//		$select_skill_name2=mysql_query("select * from  sedna_skills where skill_name ='$skil'");
//		$num_of_consultants2= mysql_num_rows($select_skill_name2); 
//		?>
//		
//		
//          
//          ["<? echo ucfirst($skil); ?>", "<? echo $num_of_consultants2; ?>"],
//          
//		
//		<?
//		
//		}
//	
//		   ?> 
//       
//        ]);
//        var options = {
//          title: 'Different Skill Set',
//          width: 500,
//          legend: { position: 'none' },
//          //chart: { subtitle: 'popularity by percentage' },
//          axes: {
//            x: {
//              0: { side: 'bottom', label: 'Skill'} // Top x-axis.
//            }
//          },
//          bar: { groupWidth: "35%" },
//	  
//        };
//
//        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
//        // Convert the Classic options to Material options.
//        chart.draw(data, google.charts.Bar.convertOptions(options));
//      };
    </script>
   
   
   <script type="text/javascript">
      ////google.charts.load('current', {'packages':['bar']});
      //google.charts.setOnLoadCallback(drawStuff12);
      //function drawStuff12() {
      //  var data = new google.visualization.arrayToDataTable([
      //      
      //  ['Move', 'Percentage'],
      //    ["King's pawn (e4)", 44],
      //    ["Queen's pawn (d4)", 31],
      //    ["Knight to King 3 (Nf3)", 12],
      //    ["Queen's bishop pawn (c4)", 10],
      //    ['Other', 3]
      //
      //  ]);
      //
      //  var options = {
      //    title: 'Different Location12',
      //    width: 500,
      //    legend: { position: 'none' },
      //    //chart: { subtitle: 'popularity by percentage' },
      //    axes: {
      //      x: {
      //        0: { side: 'bottom', label: 'Location'} // Top x-axis.
      //      }
      //    },
      //    bar: { groupWidth: "35%" }
      //  };
      //
      //  var chart = new google.charts.Bar(document.getElementById('top_x_div12'));
      //  // Convert the Classic options to Material options.
      //  chart.draw(data, google.charts.Bar.convertOptions(options));
      //};
    </script>
   
   <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Operators', 'Total'],
	    
		   <?php
		
		$select_resum_uplode_count=mysql_query("SELECT *,COUNT(operator_id) as count FROM sedna_operator_request_consultants_reg sorcr
							   INNER JOIN sedna_user_registration_tbl surt on sorcr.operator_id = surt.id
							   GROUP BY surt.id order by count");
		//$bhjbdsjd = mysql_num_rows($select_consultants1);
		$nnc = 1;
		while($fetch=mysql_fetch_array($select_resum_uplode_count))
		{
			
		 $oprater_name = ucfirst($fetch['name']);
		 $resum_count = $fetch['count'];
		 $department = $fetch['department'];
		
		
		?>
		
		//   ["<? echo ucfirst($oprater_name); ?>", "<? echo $resum_count; ?>"],
          
	     //alert("<? echo ucfirst($oprater_name); ?> ");
	    
          ["<?  if($department =='operator' ){  echo $oprater_name.' (Operator)'; } elseif($department =='TL'){ echo $oprater_name.' (Team Leader)'; } ?>", "<? echo $resum_count; ?>"],
          
		
		<?
		$nnc++;
		}
	
		   ?> 
       
	   
        ]);
	  
        var options = {
          title: '',
          width: 750,
          legend: { position: 'none' },
	    
          //chart: { subtitle: 'popularity by percentage' },
          axes: {
            //x: {
            //  0: { side: 'bottom', label: 'Operators'} // Top x-axis.
            //},
		
		y: {
              0: { label: 'Total Resume Uploaded'} // Top y-axis.
            }
          },
          bar: { groupWidth: "35%" },
	    
	    
	     //colors: ['red','green']
	    
	  
        };

        var chart = new google.charts.Bar(document.getElementById('resum_status_count'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
   
   
   
    
   
   

<!--<div class="container">
<hr>
</div>-->







<div class="container content mtb">

<div class="row ">
            <div class="col-lg-12">
           <h3 class="block-head">Dashboard</h3>
		   
		

<div class="row">

	  <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="fa fa-users widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Total Consultants</p>
                                        <h2><?php
	  $select_consultants=mysql_query("select * from  sedna_operator_request_consultants_reg");
		echo  $num_of_consultants = mysql_num_rows($select_consultants); 
		   ?></h2>
                                        
                                    </div>
                                </div>
                            </div><!-- end col -->
	  

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="fa fa-users widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Verified Consultants</p>
                                        <h2>
										 <?php
		   
	  $select_consultants=mysql_query("select * from  sedna_operator_request_consultants_reg where status='1'");
		echo $num_of_consultants = mysql_num_rows($select_consultants);
		
		?>  
										</h2>
                                        
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="fa fa-users widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Not Verified Consultants</p>
                                        <h2>
										  <?php
		$select_consultants=mysql_query("select * from  sedna_operator_request_consultants_reg where status!='1'");
		echo $num_of_consultants = mysql_num_rows($select_consultants); 
		   ?>
										</h2>
                                        
                                    </div>
                                </div>
                            </div><!-- end col -->


                          

                        </div>





<!--<div class="row">

                            <div class="col-lg-6 col-md-4 col-sm-6">
                            
							 <div id="top_x_div" style="width: 500px; height: 500px;"></div>
                            </div>
                            
                           <div class="col-lg-6 col-md-4 col-sm-6">
                            
                             <div id="top_x_div12" style="width: 500px; height: 500px;"></div>
                            </div> 
                            
                            
                            
                            </div>-->

<div class="row">

                            <div class="col-lg-6 col-md-4 col-sm-6">
                            
							 <div id="resum_status_count" style="width: 500px; height: 500px;"></div>
                            </div>
                            
                         
                            
                            
                            
                            </div>


</div>
</br>
</br>
</br>
</br>
</br>
            </div>


</div></div>



    <div class="container">
    </div>
	
					
					

