<?php
    require_once('../manage_webmaster/admin_includes/config.php');    
    require_once('mobile_common_functions.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $response = array();    
    $lists = array();
   
        //Send Paramters to function for check
        $t_name='catalog_pdf';        
        $status ='0';  //If status = 0 || 1 - (active || inactive)        
        $getData = MobileCommonClass::getAllProductsData($t_name,$status);
        $response["lists"] = array();
        while($row = $getData->fetch_assoc()) {
            //Chedck the condioton for emptty or not        
            $lists = array();
            $lists["id"] = $row["id"];  
            $lists["pdf_title"] = $row["pdf_name"]; 
            $lists["pdf_image"] = $base_url."uploads/pdf.png";      
            $lists["pdf_file"] = $base_url."uploads/catalog_pdf/".$row["pdf_name"];
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