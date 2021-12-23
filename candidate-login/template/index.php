<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
<meta name="viewport" content="width=device-width">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Candidate Login</title>
    <link rel="shortcut icon" type="image/png" href="template/images/logo-itCareer.fw__300.png"/>
<link href="template/css/login.css" rel="stylesheet">
    <link href="template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="template/css/components.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
	<?php if(isset($_SESSION['candidate_email'])){?>
    <link href="template/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/css/menu.css" rel="stylesheet">
    <link href="template/css/mycss.css" rel="stylesheet">
<?php }?>
    <!-- Custom Fonts -->

    
    <script src="template/js/jquery-1.11.2.min.js"></script>
<script src="template/js/jquery-migrate-1.2.1.min.js"></script>
   <script src="template/js/menu.js" type="text/javascript"></script>
    <script src="template/js/app.min.js" type="text/javascript"></script>
<script src="template/js/bootstrap.js"></script>
<script src="template/js/bootstrap-toggle.js"></script>
<script src="ckeditor/ckeditor.js"></script>

<!--Date picker-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>-->
  
  <link rel="stylesheet" type="text/css" href="template/css/bootstrap.min.css" />
   <script type="text/javascript" src="template/js/jquery.tokenize.js"></script>
<link rel="stylesheet" type="text/css" href="template/js/jquery.tokenize.css" />
  
    <script>
    $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
  </script>
  
<!--Date picker-->

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
$(document).ready(function() {
$('#example').DataTable();
} );	
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
    color: #0C481A;
</style>
</head>

<body>
<?php if(isset($_SESSION['candidate_email'])){ ?>
<div class="top">
<div class="container">
<div class="row ">
            <div class="col-lg-12"><img src="template/images/qwert.png" class="responsive fl pt_5 " style="width: 230px; margin-bottom: 10px;">
            <?php //if($_SESSION['full_form'] == ''){?>
		  <div id='cssmenu' class="fl">
<ul>
   
                    <!--<li class="" id="dashboard"><a href="?page=dashboard">Dashboard</a></li>-->
                    <li class="" id="dashboard"><a href="#">Dashboard</a></li>
                       <!-- <li id=""><a href="#"><i class="fa fa-user pr_5"></i> Employees</a>
                            <ul>
                            <li id="add_emp"><a href="?page=add_emp">Add Employee</a></li>
							<li id="add_emp"><a href="?page=show_emp">Show Employees</a></li>
                            
                        
                            </ul>
                        </li>-->
				   
				  <!--<li id="search_jobs"><a href="?page=search_jobs">Search Jobs</a></li>  -->
				  <li id="search_jobs"><a href="#">Search Jobs</a></li>
				  
				  <!--<li id="application_list"><a href="?page=application_list&page_no=1">Application List</a></li>-->
				  <li id="application_list"><a href="#">Application List</a></li>
				  
				 <!-- <li id="interview_schedule"><a href="?page=interview_schedule&page_no=1">Scheduled Interview  </a></li>-->
                         
                      <!-- <li class="" id="add_consultants"><a href="#"> Manage Consultants</a>
                           <ul>
                           <li id="add_consultants"><a href="?page=add_consultants">Add Consultant</a></li>
                            <li id="show_consultants"><a href="?page=show_consultants&page_no=1">Consultant List</a></li>
							<li id="search"><a href="?page=search">Search Consultant</a></li>
		                  
                           </ul>
                       </li>-->
                 
                           
                         <!--   <li id="dashboard_account"><a href="?page=dashboard_account">Account Status</a></li>-->
                            
                        <!-- <li class=" " id="request_Of_old_consultant"><a href="?page=request_Of_old_consultant&page_no=1">Operator Requests </a>
                          
                         </li>-->
                        
              
</ul>
</div>
     <?php //} ?> 
      <div class="user-info">      
   <nav class="user fr">
							<div class="user-info pull-right">
							
								<div class="btn-group">
									<a class="btn dropdown-toggle one_hov" data-toggle="dropdown" href="#">
										<i class="fa fa-user pr_5"></i><strong><?php
										$query = $conn->query("SELECT * FROM sedna_user_registration_tbl WHERE id='".$_SESSION['candidate_id']."'");
										$row = $query->fetch_array();
										echo ucfirst($row['name']);  ?></strong> (Candidate)
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="?page=view_profile_admin"><span class="awe-cogs"></span><i class="fa fa-cogs" aria-hidden="true"></i>
 Account Settings</a></li>
										<li><a href="?page=change_pass"><span class="awe-cogs"></span><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a></li>
										
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
//if($_SESSION['candidate_email']!="")
//{ 
//echo  GetMessage();
//}
				?></b></span>
<?php include($include);?>
            
    <div class="footer"  style="background: #E4F5DD;">
       <div class="container ">
            <div class="row">
                <div class="col-lg-12 tc">
                   Copyright &copy; <?php echo date("Y"); ?>
                </div>
            </div></div>
 
    </div>
    
<!--<a href="#" class="go-top"><span class="fa fa-chevron-up"></span></a>-->
<!--<script type="text/javascript">
	$("#cssmenu").menumaker({
		title: "Menu",
		format: "multitoggle"
	});
</script>-->
		<script type="text/javascript" src="template/js/jquery.accordion.js"></script>
		<script type="text/javascript" src="template/js/jquery.easing.1.3.js"></script>
        
   <script type="text/javascript">
            $(function() {
			
				$('#st-accordion').accordion();
				
            });
        </script>
<script>
	$(document).ready(function() {
    $('[id^=detail-]').hide();
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
});
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
			});
		});
	</script>
</body>

</html>
