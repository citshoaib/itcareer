<?PHP 
@session_start();

		
	/****************HEADER LOCATION******************/
    function redirect($location){echo '<script>window.location.href="'.$location.'";</script>';}
	
	/****************Set msg******************/	
	
	 function SetMessage($message, $type){
 
         $_SESSION['SetMessage']='<div class="'.$type.'">'.$message.'</div>';
    }
        /****************get msg******************/

    function GetMessage(){

       $GetMessage = $_SESSION['SetMessage'];
        unset($_SESSION['SetMessage']);
        return  $GetMessage;
       
    }

  // search page funclions//
  
  
$condition_array=array("All"=>"AND","Any"=>" OR ","Boolean"=>"Match");/// define in function


		 
function search_candidate_skillwise($skill_set,$skill_name,$experince)
{
	if($skill_set=="Year")
	{
		$skill_set="All";
	}
	    global $condition_array;
		
	//	Print_r($condition_array);
		$skill_name=array_filter($skill_name);
		
		$experince=array_filter($experince);
		//echo "<pre>";print_r($skill_name);
		//echo "<pre>";print_r($experince);
		
		$where="";
		$cond="";
		foreach($skill_name as $key=>$val)
		{
			if($skill_set!="Boolean"){
				$cond=$condition_array[$skill_set];
		$where.="(d.skill_name like '%".$val."%'";
		if($experince[$key]!=""){
			
			 $where.=" and d.year_exp >=".$experince[$key];
		}
		$where.=") $cond ";
			           }
					   else{
						$val="'".$val."'";
						$cond="AND";
		if($key==count($skill_name))
		{
		$cond="";
		}
		
         $where.= "MATCH(d.skill_name,d.year_exp) AGAINST (".$val.' '.$experince[$key].") IN BOOLEAN MODE) $cond ";
						 
					   }
		}
			$where=rtrim($where, " $cond ");
			return $where;
	//$where="";
	//
	//
	//$where.=
	//	
		
    
}



function search_candidate($type,$field,$string)
	{
		
		
		
		 global $condition_array;

		//print_r($condition_array);
		 
        $field_array=array('a.email','b.first_name','b.middel_name','b.last_name','b.city','b.country', 'b.state', 'b.phone_no', 'b.postal_code','b.employment_type',
					 'b.salary', 'b.hourly_rate', 'b.work_authorization', 'b.travel', 'b.experience', 'b.position','c.education', 'c.institution', 'c.city', 'c.state',
					 'c.country','d.year_exp','d.skill_name','e.job_title','e.comapnay','f.resume_data');
        
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
				if($field!="comapnay" and $field!="position"){
				$cond=") ".$condition_array[$type]." (";
                 $old_word="";
				}
				else{
					
					$cond= " ".$condition_array[$type]." ";
				}
                  
				
			}
		else
		{
            if($where!="("){
               
                $cond=($type=='All') ? ' or ' : ' and ';
				
			$cond=" or ";
            }
		}
			$where.=$cond.$field_value." like '%".$explode_string[$i]."%'";
		
	
		
		}
		$old_word=$explode_string[$i];
        
       		}
              }
        else
        {
			$string=stripslashes($string);

			
			  
//			$field_array = array_diff($field_array, array('f.resume_data'));
//            $field_array=implode(",",$field_array);
//            $where ="MATCH(";
//         $where.= $field_array.") AGAINST (".$string." IN BOOLEAN MODE";

$btosql = new BooleanToSQL($string);
$varnames = array("f.resume_data");
$where.= $btosql->getSQL($varnames, "and", "regexp", "[[:<:]]", "[[:>:]]");

            
        }
      
//	  
		   $where.=")";
//		   if($type=="Boolean"){
//     $where.=" or MATCH (f.resume_data) AGAINST (".$string." IN BOOLEAN MODE)";
//		   }
	 
return $where;
		
	}
	
	
	//// distance_mile function //90001
	
	
//	function search_distance_mi($postal_code,$distance_mile)
//	{
//		
//   $url_data = file_get_contents("https://www.zipcodeapi.com/rest/fSYr5c9AkrzIufIWcgjeGX3dZeQP7UEnNCOSOYs9p1RThAQuQ9Jx7MK61AW9vAwi/radius.json/$postal_code/$distance_mile/mile");
//  
//	$url_data_array=json_decode($url_data,True);
//	if(count($url_data_array)>0)
//	{
//		//echo "<pre>";
//	
//	//print_r($url_data_array);
//	$where='';
//	
//	foreach($url_data_array['zip_codes'] as $key=>$val)
//	{
//		
//	//echo "<br>". count($val);
//		
//		foreach($val as $keys=>$values)
//	{
//		if($where!='')
//		{
//		if($keys=='zip_code')
//		{
//		$where.=" || b.postal_code=".$val[$keys]; 
//		}
//		if($keys=='city')
//		{
//			$where.=" || ". "b.city like '%".$val[$keys]."%'"; 
//		}
//		}
//		else
//		{
//			if($keys=='zip_code')
//		{
//		$where.="( b.postal_code=".$val[$keys]; 
//		}
//		if($keys=='city')
//		{
//			$where.=" || ". "b.city like '%".$val[$keys]."%'"; 
//		}
//			
//		}
//	}
//	}
//	
//
//	return  $where.") AND ";
//    }
//	}
	
	
	
	
	///new zip code search with mile code
	
		function search_new_distance_mi($postal_code,$distance_mile)
    {
     // echo "fsdfs".$postal_code.'-->'.$distance_mile;
	  
	  
	  $portland =  new ZipCode($postal_code);
	   $where='';
	  foreach ($portland->getZipsInRange(0, $distance_mile) as $miles => $zip) {
    
    $miles = round($miles, 1);
	
	if($where!='')
	{
   $where.=" || ". "b.postal_code = $zip"; 
	}
	else
	{
	$where.= "( b.postal_code = $portland"; 
	}
	
    //echo "Zip code <strong>$zip</strong> is <strong>$miles</strong> miles away from "
    //    ." <strong>$portland</strong> ({$zip->getCounty()} county)<br/>";
       

      
  }
  return $where.") AND ";
	  
	}
	
	
 
	
?>