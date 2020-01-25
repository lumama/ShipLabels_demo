<?php


/*
 * get address for a given sono
 * 
 * 
 * 3-7-19 added some error msg
 */

require ('../model/LabelModelMysql.php');


if (isset($_GET['id'])) {
    $cur_sono = $_GET['id'];
    //echo $cur_sono;
    
    $LabelTable = new LabelModelMysql();
   
    
    $detail_count=0;
    $company="";
    $address="";
    $cpo="";
    $custno="";
    $LabelTable->get_sono_detail($cur_sono, $detail_count, $company, $address, $cpo, $custno);
    //echo "detail_count=$detail_count company = $company address=$address <br/>";
    if ($detail_count>0) {
        //include "../view/subview/LabelDetail.php";
        echo "<br>$company<br><br>$address<br><br>PO:  $cpo<br>";
    }else {
        echo "<div class='msgbox'>Error: SONO:  $cur_sono not found</div>";
    }
   
     
    
    
   
}else {
    echo "Error connecting with Server: incorrect parameter";
}

?>
