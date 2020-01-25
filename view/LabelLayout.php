<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" href="css/common/BomStyle.css" type="text/css" media="screen"/> 
        <link rel="stylesheet" href="css/LabelStyle.css" type="text/css" media="screen"/> 
        <link rel="stylesheet" href="css/LabelPrint.css" type="text/css" media="print"/> 
        <link href="http://code.jquery.com/ui/1.10.4/themes/excite-bike/jquery-ui.css" rel="stylesheet">
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <script type="text/javascript" src="js/LabelScript.js"></script>
        <script src="js/jquery.cookie.js"></script>
        
        <style type="text/css">
            @page { size:4in 6in; margin: 0; size: landscape; }
        </style>
        
        <title>Shipping Label</title>
    </head>
    <body>
        <div id="header">
                
                    Shipping Labels
               
        </div>        
        <div id="wrap">
            <div id="control">
                
                <br/>
      
                SONO: <input type="text" id="input_sono" class="uppercase" ><br/>
               
                <hr/><br/>
                
                <select class="label_list" size="30" name="sel_sono">
                <?php
                    $count=0;    
                    foreach ($sono_list as $sononum) {
                        if ($count==0) {
                            
                            echo "<option selected>$sononum</option>";
                            $count++;
                        }else {
                            echo "<option>$sononum</option>";
                        }
                    }
                ?>
                </select>
                

               
                     
                
            </div>
            <div id="detail">
                 <div id="server_msg"></div>
            <?php
               
                include "subview/LabelDetail.php";?>
            </div>    
            
        <div id="footer">
                Yvonne Lu Software Consulting
        </div>    
    </body>
</html>
