        
            
            <h3><div id="sono_now" class="noprint"><?php echo "SONO:  $cur_sono";?></div></h3>


            <table>
          
             <tr>
                <td class="noprint" colspan="2">
                    <div id="height"></div>
                    <div id="width"></div>
                    <button id="bigger" class="basic_button">Expand</button>&nbsp;
                    <button id="smaller" class="basic_button">Reduce</button>&nbsp;                    
                    <button id ="print_label" class ="basic_button" type="button">Print</button><br/><br/>
                </td>
            </tr>
            <tr>
                <td class="noprint">
                  <div class="vslider_section">
                      
                      <div id="vslider"></div>
                  </div>

                </td>
                <td>    
                    <div id="label_area">
                        <div class="element">
                        <?php
                          
                            
                            echo "$company<br><br>";
                            echo "$address<br><br>";
                            echo "PO:  $cpo";
                         ?>   
                        </div>
                    </div><br/>
                    <div class="hslider_section">
                       
                        <div id="hslider"></div>
                    </div>
                </td>
            </tr>
           
            </table>
               
            
            