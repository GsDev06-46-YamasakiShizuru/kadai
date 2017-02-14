<?php
function loginCheck{
   
if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    echo "LOGIN Error";
    exit();
}else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"]=session_id();
}
}

?>