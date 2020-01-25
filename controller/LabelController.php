<?php include_once ("model/LabelModelMysql.php");?>

<?php
//controller to print ship labels
    class LabelController {
        private $LabelTable;
        
        public function __construct()  
        {  
            //get a connection to database
            $this->LabelTable = new LabelModelMysql();

        } 
        //start the procedure
        public function invoke() {
            //get list of sales orders from cust_so table
            $sono_list = $this->LabelTable->get_sono_list();
            
            //initialize 
            $cur_sono=$sono_list[0];
            $detail_count=0;
            $company="";
            $address="";
            $cpo="0";
            $custno="0";
            
            //get address detail from database
            $this->LabelTable->get_sono_detail($cur_sono, $detail_count, $company, $address, $cpo, $custno);
            
            //render information
            include 'view/LabelLayout.php';
            
        }
        
        
        
    }



?>
