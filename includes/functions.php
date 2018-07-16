<?php
 	

 	function confirm_query($result_set){
 		if(!$result_set){

 			die("Database query failed.");
 		}


 	}


 	function find_all_subjects(){
 		global $connection;

 		$query = "SELECT * FROM subjects WHERE visible = 1";  
        $subject_set =  mysqli_query($connection, $query);
       
        return $subject_set;
 	}


 	function find_pages_by_id($subject_id){
 		global $connection;

 		$query2 = "SELECT * FROM pages WHERE visible = 1 AND subject_id = {$subject_id}";  
        $page_set =  mysqli_query($connection, $query2);
        return $page_set;
 	}
?>