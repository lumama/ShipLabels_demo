<?php 
/*
 * Shipping Label print program
 * 
 */

include_once("controller/LabelController.php");
?>

<?php
            
            
            $obj = new LabelController();
 
            $obj->invoke();
          
            
?>

