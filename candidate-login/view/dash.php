<?php

//echo "<pre>";

if(!$_SESSION["candidate_email"]){
	  header('location:?page=login');
}
?>

<style>
.table-striped > tbody > tr:nth-of-type(2n+1) {
    background-color: rgba(0, 0, 0, 0.08);
}



.blue:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
    background-color: #2980b9;
    color: #fff;
}
.teal:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
    background-color: #16a085;
    color: #fff;
}
.red:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
    background-color: #c0392b;
    color: #fff;
}
.green:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
    background-color: #27ae60;
    color: #fff;
}
.perple:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
    background-color: #2b3076;
    color: #fff;
}
.orange:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
    background-color: #d35400;
    color: #fff;
}
.cyan:not(select):not(input):not(.list):not(.progress):not(.progress-circle) {
    background-color: #00bcd4;
    color: #fff;
}

.dash-stat {
    background: rgba(0, 0, 0, 0.1) none repeat scroll 0 0;
    cursor: default;
    height: 150px;
    margin-bottom: 15px;
    overflow: hidden;
    position: relative;
    text-align: center;
    text-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
}
.light-shadow {
    box-shadow: 0 1px 10px rgba(0, 0, 0, 0.07);
}
.rounded {
    border-radius: 3px !important;
}
.dash-stat .dash-stat-chart {
    bottom: -10px;
    height: 70%;
    left: 0;
    opacity: 0.6;
    position: absolute;
    transition: all 0.1s ease 0s;
    width: 100%;
    z-index: 1;
}
.dash-stat .dash-stat-chart canvas {
    margin-left: -10px;
    width: calc(100% + 20px);
}
.dash-stat .dash-stat-cont {
    height: 100%;
    left: 0;
    padding: 20px;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 2;
}
.dash-stat .dash-stat-main {
    display: block;
    font-size: 30px;
    font-weight: bold;
    margin: 30px 0 15px;
    transition: all 0.1s ease 0s;
}
.dash-stat .dash-stat-sub {
    opacity: 0.8;
}
.dash-stat .dash-stat-more {
    bottom: 0;
    cursor: pointer;
    left: 0;
    padding: 5px 5px 5px 10px;
    position: absolute;
    text-align: left;
    transform: translate(0px, 100%);
    transition: all 0.1s ease 0s;
    width: 100%;
}
.dash-stat .dash-stat-more i {
    float: right;
    font-size: 12px;
    margin: 3px 5px 0;
}
.dash-stat:hover .dash-stat-chart, .dash-stat:hover .dash-stat-icon {
    opacity: 1;
}
.dash-stat:hover .dash-stat-main {
    margin-top: 12px;
}
.dash-stat:hover .dash-stat-more {
    transform: translate(0px, 0px);
}

</style>

<div class="container content mtb">
    
<div class="container">
    
    
<?php

$rowhgyt=$_SESSION['candidate_id'];

$dfhh=mysql_query("SELECT master_id FROM `sedna_user_registration_tbl` where id='$rowhgyt'");
$fchjh=mysql_fetch_array($dfhh);
$master_id_can=$fchjh['master_id'];


$total_jobs = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can'") or die(mysql_error());
$jobs_count = mysql_num_rows($total_jobs);

$pending_candidate = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can' and status='0' ") or die(mysql_error());
$upccoming = mysql_num_rows($pending_candidate);

//$active_candidate = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can' and status='1' ") or die(mysql_error());
//echo 'Total Active candidate - '.$total_active_candidtae= mysql_num_rows($active_candidate);
//echo "<br>";

//$reject_candidate = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can' and status='2' ") or die(mysql_error());
//echo 'Total Reject candidate - '.$total_reject_candidtae = mysql_num_rows($reject_candidate);
//echo "<br>";

$Schedule_candidate = mysql_query("SELECT * FROM apply_jobs where candidate_id='$master_id_can' and status='1' ") or die(mysql_error());
$schedule = mysql_num_rows($Schedule_candidate);

?>

<div class="row ">
<div class="col-lg-12">
<h3 class="block-head">Dashboard</h3>

</div>

</div>

<div class="row ">

<div class="col-lg-12">
    
 <div class="col-md-3">
<div class="dash-stat light-shadow blue rounded">
<span id="stat-1" class="dash-stat-chart"><canvas style="display: inline-block; width: 139px; height: 105px; vertical-align: top;" width="139" height="105"></canvas></span>
<div class="dash-stat-cont">
<span class="dash-stat-main"><?php echo number_format($jobs_count);?></span>
<span class="dash-stat-sub">Total Jobs</span>
<!--<span class="dash-stat-more">View History <i class="fa fa-arrow-right"></i></span>-->
</div>
</div>
</div>   

<!--<div class="col-md-3">
<div class="dash-stat light-shadow teal rounded">
<span id="stat-2" class="dash-stat-chart"><canvas style="display: inline-block; width: 248px; height: 105px; vertical-align: top;" width="248" height="105"></canvas></span>
<div class="dash-stat-cont">
<span class="dash-stat-main"><?php //echo number_format($schedule);?></span>
<span class="dash-stat-sub">Total Interview Scheduled </span>
<!--<span class="dash-stat-more">View Full Statistic <i class="fa fa-arrow-right"></i></span>-->
<!--</div>
</div>
</div>-->

<!--<div class="col-md-3">
<div class="dash-stat light-shadow red rounded">

<div class="dash-stat-cont">
<span class="dash-stat-main"><?php //echo number_format($upccoming);?></span>
<span class="dash-stat-sub">Upcoming Interviews</span>
<!--<span class="dash-stat-more">View All Users <i class="fa fa-arrow-right"></i></span>-->
<!--</div>
</div>
</div>-->

<div class="col-md-3">
<div class="dash-stat light-shadow blue rounded">

<div class="dash-stat-cont">
<span class="dash-stat-main"><?php echo number_format($upccoming);?></span>
<span class="dash-stat-sub">Last Updated Resume</span>
<!--<span class="dash-stat-more">View All Users <i class="fa fa-arrow-right"></i></span>-->
</div>
</div>
</div>

</div>
</div>
</div>
</div>

