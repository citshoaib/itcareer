<!DOCTYPE html>
<html lang="en">
	 <?
	 error_reporting(0);
	 
	// if( !isset($_SESSION['id']) ){
	//	  if($_REQUEST["page"]!="login"){
	//	    header('Location: ?page=login');
	//		   }
	// 
	// }
	 
	 ?>

<head>

    <meta charset="utf-8">
<meta name="viewport" content="width=device-width">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employer Login</title>
    <link rel="shortcut icon" type="image/png" href="template/images/unnamed.png"/>
<link href="template/css/login.css" rel="stylesheet">
    <link href="template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="template/css/components.min.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" type="text/css" href="template/css/bootstrap.min.css" />
    <!-- Bootstrap Core CSS -->
	<?php if(isset($_SESSION['employer_email'])){?>
    <link href="template/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/css/menu.css" rel="stylesheet">
    <link href="template/css/mycss.css" rel="stylesheet">
<?php }?>
    <!-- Custom Fonts -->

    
    <script src="template/js/jquery-1.11.2.min.js"></script>
<script src="template/js/jquery-migrate-1.2.1.min.js"></script>
   <!--<script src="template/js/menu.js" type="text/javascript"></script>-->
    <script src="template/js/app.min.js" type="text/javascript"></script>
<script src="template/js/bootstrap.js"></script>
<script src="template/js/bootstrap-toggle.js"></script>
<script src="ckeditor/ckeditor.js"></script>



<!- multiselect --->
	 <script type="text/javascript" src="template/js/jquery.tokenize.js"></script>
<link rel="stylesheet" type="text/css" href="template/js/jquery.tokenize.css" />
	 



<!--Date picker-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>-->
  
    <script>
    $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
    
  } );
  </script>
  
<!--Date picker-->

<!--time picker-->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>
	

$(document).ready(function(){
    $('#timepicker').timepicker({});
});


</script>

<!--time picker-->

<!--tab_ui.js-->
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
<script src="template/js/tab_ui.js"></script>
 <link href="template/css/jquery-ui.css" rel="stylesheet">

<!--teb_ui.js end-->
<!-- DataTables CSS -->
<link href="template/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script src="template/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script>
//$(document).ready(function() {
//$('#example').DataTable();
//} );	
</script>
<!-- DataTables CSS end -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!--hislide-->
   <link rel="stylesheet" type="text/css" href="highslide/highslide/highslide.css" />
    <script type="text/javascript" src="highslide/highslide/highslide-with-html.js"></script>
 
<script type="text/javascript">
hs.graphicsDir = 'highslide/highslide/graphics/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';
</script>
<!--hislide-->


<script type="text/javascript">
<?php  $page=$_REQUEST["page"];?>
$(document).ready(function() {

<?php if(!isset($_REQUEST["page"]))
{?>
$("#dashboard").addClass("active");
//document.getElementById("Home").setAttribute("class","active");

<?php }else{?>
    $("#<?php echo $page;?>").addClass("active");
//document.getElementById("<?php echo $page;?>").setAttribute("class","active");
<?php }?>

});
</script>

<style>
.top{
    background:#e4f5dd;
    
}
#cssmenu > ul > li:hover > a, #cssmenu > ul > li.active > a {
    color:#0C481A;
}
#cssmenu > ul > li > a {
    color:#0C481A;
}
#cssmenu ul ul li:hover > a, #cssmenu ul ul li a:hover {
    color: #0C481A;}
.block-head {
       color:#0C481A; 
    }
    .block-head::after, .block-head::before {
    background-color: #0C481A;}
    #cssmenu > ul > li.has-sub > a::before {
        background: #0C481A;
    }
    #cssmenu > ul > li.has-sub > a::after {
         background: #0C481A;
    }
    .btn-primary:hover, .btn-primary:focus, .btn-primary.focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
    background-color: #0C481A;}
    input[type="submit"] {
        background:#0C481A;
    }
    .btn-default:hover, .btn-default:focus, .btn-default.focus, .btn-default:active, .btn-default.active, .open > .dropdown-toggle.btn-default {
    background-color: #0C481A;}
    .btn-primary1 {
    color: #000;
    background-color: #e4f5dd;
}
.btn:hover, .btn:focus, .btn.focus {
    color: #fff;}
    .btn:hover, .btn:focus, .btn.focus {
    color: #0C481A;
}
.btn:hover, .btn:focus, .btn.focus {
    color: #fff;}
 
  .btn-group > .btn:first-child {
    margin-left: 0;
    color: #0C481A;}
</style>


</head>
<?php
 $_SESSION['emp_name'];

$_SESSION['employer_id'];?>
<body>
<?php if(isset($_SESSION['employer_email'])){?>
<div class="top">
<div class="container">
<div class="row ">
            <div class="col-lg-12"><img src="template/images/logo-itCareer.fw__300.png" class="responsive fl pt_5 " style="width: 230px; margin-bottom: 10px;">
            <div id='cssmenu' class="fl">
<ul>
   
                    <li class="" id="dashboard"><a href="#">Dashboard</a></li>
                       <!-- <li id=""><a href="#"><i class="fa fa-user pr_5"></i> Employees</a>
                            <ul>
                            <li id="add_emp"><a href="?page=add_emp">Add Employee</a></li>
							<li id="add_emp"><a href="?page=show_emp">Show Employees</a></li>
                            
                        
                            </ul>-->
                        </li>
                         
                       <li class="" id="addjob_form"><a href="#"> Manage Jobs</a>
                           <ul>
                           <li id="addjob_form"><a href="?page=addjob_form"><!--<i class="fa fa fa-list pr_5"></i>-->Add Jobs</a></li>
                            <!--<li id="show_consultants"><a href="?page=show_consultants&page_no=1">Consultant List</a></li>
							<!--<li id="pending_consultants"><a href="?page=pending_consultants&page_no=1">Draft Consultants</a></li>-->
						<!--	<li id="search"><a href="?page=search">Search Consultants</a></li>-->
							<!--<li id="add_manager"><a href="?page=salary_slip">Salary Slip</a></li>
							<li id="add_manager"><a href="?page=contactus_manage">Contact Inquiries</a></li>-->
							<li id="manage_job_info"><a href="?page=manage_job_info&page_no=1">Job List</a></li>
							<!--<li id="job_application"><a href="?page=job_application&page_no=1">Job Applications</a></li>-->
							<!--<li id="add_manager"><a href="?page=show_apply_job">Show Apply Jobs</a></li>-->
							
							
							
							<!--<li id="add_manager"><a href="?page=search_time_sheet">view Time Sheet</a></li>-->
                            
                           </ul>
                       </li>
					   
					    <li class="" id="add_consultants"><a href="#"> Manage Candidate</a>
                           <ul>
                           <!--<li id="add_consultants"><a href="?page=add_consultants">--><!--<i class="fa fa fa-list pr_5"></i>--><!--Add Candidate</a></li>-->
                            <!--<li id="show_consultants"><a href="?page=show_consultants&page_no=1">Consultant List</a></li>
							<!--<li id="pending_consultants"><a href="?page=pending_consultants&page_no=1">Draft Consultants</a></li>-->
							<li id="search"><a href="#">Search Candidate</a></li>
							<!--<li id="search"><a href="?page=search">Search Candidate</a></li>-->
							<!--<li id="add_manager"><a href="?page=salary_slip">Salary Slip</a></li>
							<li id="add_manager"><a href="?page=contactus_manage">Contact Inquiries</a></li>-->
						
							<!--<li id="add_manager"><a href="?page=show_apply_job">Show Apply Jobs</a></li>-->
							
							
							
							<!--<li id="add_manager"><a href="?page=search_time_sheet">view Time Sheet</a></li>-->
                            
                           </ul>
                       </li>
					    
					    <!--<li class="" id="application_list"><a href="?page=application_list&page_no=1">Application List</a></li>-->
					    <li class="" id="application_list"><a href="#">Application List</a></li>
					    <!--<li id="interview_schedule"><a href="?page=interview_schedule&page_no=1">Scheduled Interview </a></li>-->
				   
				  <!-- <li class="" id="request_consultants"><a href="?page=request_consultants&page_no=1">Consultants Requests </a></li>-->
                 
                           
                            <!--<li id="dashboard_account"><a href="?page=dashboard_account">Account Status</a></li>
                            
                         <li id=""><a href="#">Utility </a>
                          <ul>   
                          <li id="eod"><a href="?page=eod">End Of Day</a></li>
                            <li id="priority"><a target="_blank" href="#">Admin Help</a></li>
                             <li id="change_password"><a href="?page=change_password">CHANGE PASSWORD </a></li>
                             <li id="priority"><a href="?page=priority">User Priority</a></li>
                              <li id="priority"><a href="?page=adm_leads">Allot Leads</a></li>
                             <li id="priority"><a href="?page=show_services">Services</a></li>
                              <li id="priority"><a href="?page=add_list">Import A1 Leads</a></li> 
                               <li id="priority"><a href="?page=a1_list">A1 List</a></li>
                              <li id="report_sales_target_form"><a href="#">Team Target</a></li>
                             </ul>
                         </li>-->
                        
              
</ul>
</div>
      
      <div class="user-info">      
   <nav class="user fr">
							<div class="user-info pull-right">
							
								<div class="btn-group">
									<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
										<i class="fa fa-user pr_5"></i><strong><?php
										$query = $conn->query("SELECT * FROM sedna_user_registration_tbl WHERE email='".$_SESSION['employer_email']."'");
										$row = $query->fetch_array();
										//echo ucfirst($row['name']);
										echo ucfirst($_SESSION['emp_name']);?></strong> &nbsp;(Employer)
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="?page=view_profile_admin"><span class="awe-cogs"></span><i class="fa fa-cogs" aria-hidden="true"></i>
 Account Settings</a></li>
										<li><a href="?page=change_pass"><span class="awe-cogs"></span><i class="fa fa-lock" aria-hidden="true"></i>
										Change Password</a></li>
										<li class="divider"></li>
										<li><a href="?page=logout"><span class="awe-signout"></span><i class="fa fa-sign-out  pr_5"></i> Logout</a></li>
									</ul>
								</div>
							</div>
						</nav>  </div>       
            
            </div>

                
            </div>

        </div>

</div>
<?php }?>
<!--////////////////content here//////////////-->
<span><b>			              <?php 
				
				
if($_SESSION['employer_email']!="")
{ 
//echo  GetMessage();
}
				?></b></span>
<?php include($include);?>
            
    <div class="footer" style="background: #E4F5DD;">
       <div class="container ">
            <div class="row">
                <div class="col-lg-12 tc">
                   Copyright &copy; <?php echo date("Y"); ?>
                </div>
            </div></div>
 
    </div>
    
<!--<a href="#" class="go-top"><span class="fa fa-chevron-up"></span></a>-->
<script src="template/js/menumaker.js"></script>

<script type="text/javascript" src="template/js/jquery.accordion.js"></script>
		<script type="text/javascript" src="template/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
			
				$('#st-accordion').accordion();
				
            }); 
        </script>
<script type="text/javascript">
	$("#cssmenu").menumaker({
		title: "Menu",
		format: "multitoggle"
	});
</script>
<script>
		$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 300);
			})
		});
	</script>

<script>

	
$('.example_jh').DataTable(

{

//"order": [[ 0,"desc" ]],
"columnDefs": [
					{ "type": "numeric-comma", targets: 3 }
	],
"displayLength": 10,
}

);


</script>




</body>

</html>
