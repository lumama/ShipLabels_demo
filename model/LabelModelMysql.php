<?php
//retrieve label information from MYSQL tables cust_so and cust_addr

class LabelModelMysql {
    //mysql database id
    private $dbc;
    
    

    
    public function __construct()
    {
       //get connection information from configuration file
       $cur_conf =  "config/config.xml";
       $cur_conf_reload = "../config/config.xml";
       if (file_exists($cur_conf)) {
            $dbinfo = simplexml_load_file($cur_conf);
           
        } else {
            if (file_exists($cur_conf_reload)) {
                $dbinfo = simplexml_load_file($cur_conf_reload);
            }else {
                die('Configuration File Missing');
            }
        }    
        
       $this->dbc = mysqli_connect (trim($dbinfo->host), trim($dbinfo->user), trim($dbinfo->dbpw), trim($dbinfo->db));
        
        
        if (!$this->dbc) {
            die('MySQL connection error' . mysql_error());
        }

        // Set the character set to utf8
        mysqli_set_charset($this->dbc, 'utf8');
        
        
    }
    
    
    
    
    //get sono list in an array
    public function get_sono_list(){
        
        try {
            $query = "SELECT DISTINCT sono FROM cust_so ORDER BY sono";
            $cur = mysqli_query($this->dbc, $query);
            if (mysqli_num_rows($cur) >0){
                $count=0;
                while ( $value_arr = mysqli_fetch_array($cur, MYSQLI_NUM)){
                     $array[$count++]=trim($value_arr[0]);
                }
            }
            
            return $array;
        
        }catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            
        }
    }
    
    //returns company name, address, and customer purchase order number
    //returns an array and a count of how many rows of detail is returned
    public function get_sono_detail($sononum, &$detail_count, &$company, &$address, &$cpo){    
        
        
        $detail_count=0;
        try {
            //first reset everything
            $company = "";
            $address = "";
            $cpo="";
          
            
            $query = "select cust_addr.company, cust_addr.address,"
                    . "cust_addr.city, cust_addr.state, cust_addr.zip, "
                    . "cust_so.cpo from cust_so join cust_addr "
                    . "using (custno) "
                    . "where cust_so.sono=$sononum";
                   
            $cur = mysqli_query($this->dbc, $query);
            if (mysqli_num_rows($cur) >0){
                $count=0;
                while ( $value_arr = mysqli_fetch_array($cur, MYSQLI_NUM)){
                     $company   = trim($value_arr[0]);
                     $address   = trim($value_arr[1])."<br>".
                                    trim($value_arr[2]).
                                    ", ".trim($value_arr[3]).
                                    " ".trim($value_arr[4]);
                     $cpo       = trim($value_arr[5]);
                     $detail_count=1;
                     break;
                     
                }
            }else {
                //address doesn't exist
                $detail_count=0; 
            }
           
        }catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            
        }
        
    }
        
    
}
?>
