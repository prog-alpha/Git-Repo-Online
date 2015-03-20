<?php
function check_access($role_db ,$role_define) {
    if($role_db == $role_define)
	{
		//access ok
		return;
	}else if($role_define == "administrator"){
		//access restricted
		header("location:logout.php");
	}else if($role_define == "any"){
		//no access control
	}else{
	    //nothng	
	}
}





?>
