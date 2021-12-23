<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$condition_array=array("All"=>"AND","Any"=>"OR","Boolean"=>"Match");/// define in function
echo "<pre>";print_r($_POST);
$keyword_set=$_POST["keyword_set"];
$keyword_string=$_POST["keyword_search"];
if($keyword_string!=""){
$keyword_search=search_candidate($keyword_set,'All',$keyword_string);
}

$company_set=$_POST["company_set"];
$company_name=$_POST["company_name"];
if($company_name!=""){
$company_name_search=search_candidate($company_set,'comapnay',$company_name);
}

$job_title_set=$_POST["job_title_set"];
$work_feild=$_POST["work_feild"];
if($work_feild!=""){
$work_feild_search=search_candidate($job_title_set,'position',$work_feild);
}


$skill_set=$_POST["skill_set"];
$skill_name=$_POST["skill_name"];
$experince=$_POST["experince"];



search_candidate_skillwise($skill_set,$skill_name,$experince);

		 
function search_candidate_skillwise($skill_set,$skill_name,$experince)
{
	    global $condition_array;
		
		Print_r($condition_array);
		$skill_name=array_filter($skill_name);
		
		$experince=array_filter($experince);
		echo "<pre>";print_r($skill_name);
		echo "<pre>";print_r($experince);
		
		$where="";
		$cond="";
		foreach($skill_name as $key=>$val)
		{
			if($skill_set!="Boolean"){
				$cond=$condition_array[$skill_set];
		$where.="(d.skill_name like '%".$val."%' and d.year_exp >=".$experince[$key].") $cond ";
			           }
					   else{
						$cond="AND";
		if($key==count($skill_name))
		{
		$cond="";
		}
		
         $where.= "MATCH(d.skill_name,d.year_exp) AGAINST (".$val.' '.$experince[$key].") IN BOOLEAN MODE) $cond ";
						 
					   }
		}
			echo $where=rtrim($where, " $cond ");
	//$where="";
	//
	//
	//$where.=
	//	
		
    
}



function search_candidate($type,$field,$string)
	{
		
		 global $condition_array;
	echo "ssssss";	 
		print_r($condition_array);
		 
        $field_array=array('a.email','b.first_name','b.middel_name','b.last_name','b.city','country', 'b.state', 'b.phone_no', 'b.postal_code','b.employment_type',
					 'b.salary', 'b.hourly_rate', 'b.work_authorization', 'b.travel', 'b.experience', 'b.position','c.education', 'c.institution', 'c.city', 'c.state', 'c.country','d.year_exp','d.skill_name','e.job_title','e.comapnay' );
        
        if($field!="All")
        {
            
            //$selected_field_array=explode(",",$field);
            $field_array = array($field);
            // print_r($field_array);
            
        }

		$explode_string=explode(" ",trim($string));
		$old_word="";
		
		$where="(";
        $cond="";
			if($type!="Boolean"){
		for($i=0;$i<=count($explode_string)-1;$i++)
		{

		foreach($field_array as $field_value)
		{
			
			
			if(($old_word!=$explode_string[$i]) and $old_word!="") 
			{
				$cond=")".$condition_array[$type]."(";
                 $old_word="";
                  
			}
		else
		{
            if($where!="("){
               
                $cond=($type=='All') ? ' or ' : ' and '; 
			//$cond=" or ";
            }
		}
			$where.=$cond.$field_value." like '%".$explode_string[$i]."%'";
		
	
		
		}
		$old_word=$explode_string[$i];
        
       		}
              }
        else
        {
            $field_array=implode(",",$field_array);
            $where ="MATCH(";
         $where.= $field_array.") AGAINST (".trim($string)." IN BOOLEAN MODE";
            
        }
      
		echo "where->".$where.")";
		
	}


?>
