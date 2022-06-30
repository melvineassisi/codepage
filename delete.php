<?php
include_once("database.php");
 {


    $id=$_GET['id'];
   
    
    $id=DataBase::ExecuteQueryReturnID("delete from contact_tbl where id=$id");
    header("Location:listing.php");
    
    // process the form
}

?>