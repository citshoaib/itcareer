<?php
if(!$_SESSION["employer_email"]){
	  header('location:?page=login');
}
?>

<style>
	  
	  .mtb{
			min-height: 384px;
			
			
	  }
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
    
    $total_application_recived_select = $conn->query("SELECT *,apply_jobs.entry_date as entry_date_jobs,apply_jobs.status as job_status,apply_jobs.id as jod_ids_apply FROM apply_jobs
                                                    INNER JOIN sedna_job_form ON apply_jobs.jobid = sedna_job_form.id
                                                    where sedna_job_form.employer_id='".$_SESSION['employer_id']."'
                                                    ORDER BY apply_jobs.id DESC");
    $total_application_recived_count = $total_application_recived_select->num_rows;
    
    
    $total_interview_schedule_select = $conn->query($conn,"select * FROM interview_schedule where employer_id='".$_SESSION['employer_id']."' ORDER BY id DESC");
    $total_interview_schedule_count = $total_interview_schedule_select->num_rows;
    ?>
    
    </div>
    
    <div class="row ">
        <div class="col-lg-12">
            <h3 class="block-head">Dashboard</h3>       
        </div>        
    </div>
    
    <div class="row ">
           
           <div class="col-lg-12">
         

						<div class="col-md-6">
							<div class="dash-stat light-shadow blue rounded">
								<span id="stat-1" class="dash-stat-chart"><canvas style="display: inline-block; width: 139px; height: 105px; vertical-align: top;" width="139" height="105"></canvas></span>
								<div class="dash-stat-cont">
									<span class="dash-stat-main"><?php echo number_format($total_application_recived_count);?></span>
									<span class="dash-stat-sub">Total Applications Recived</span>
								
								</div>
							</div>
						</div>
                        
                        

            </div>
     </div>
</div>