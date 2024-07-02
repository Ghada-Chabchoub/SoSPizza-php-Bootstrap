<?php 
#form_validation_function

function is_empty($var, $text, $location, $ms, $data){
    if(empty($var)){
        #erreur msj
        $em="the  ".$text." is required";
        header("location: $location?$ms=$em&$data");
        exit;
    }
    return 0;
}


?>