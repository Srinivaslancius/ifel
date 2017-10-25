<?php
    require_once('../manage_webmaster/admin_includes/config.php');    
    require_once('mobile_common_functions.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $response = array();    
    $lists = array();
   
        //Send Paramters to function for check
        $t_name='tractors';        
        $status ='0';  //If status = 0 || 1 - (active || inactive)        
        $getData = MobileCommonClass::getAllProductsData($t_name,$status);
        $response["lists"] = array();
        while($row = $getData->fetch_assoc()) {
            //Chedck the condioton for emptty or not        
            $lists = array();
            $lists["id"] = $row["id"];
            $lists["tractor_name"] = $row["title"];  
            $lists["tractor_model"] = $row["model"];
            $lists["tractor_quantity"] = $row["quantity"];           
            array_push($response["lists"], $lists);      
        }
        $response["success"] = 0;
        $response["message"] = "Success";
    
} else {
    $response["success"] = 4;
    $response["message"] = "Invalid request";

}

echo json_encode($response);

?>