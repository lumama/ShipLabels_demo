/* 
 * jquery script for shipping label program
 * Yvonne Lu created 9/25/14
 */

$(function(){
    
    var org_width=600;
    var org_height=400;
    var start_w = $.cookie('label_width');
    var start_h = $.cookie('label_height');
    var start_f = $.cookie('label_font');
    if (typeof start_w === "undefined") {
         start_w = "600px";
    }
    if (typeof start_h === "undefined") {
         start_h = "400px";
    }
    if (typeof start_f === "undefined") {
         start_f = "12px";
    }
    
    $("#label_area").width(start_w);
    $("#label_area").height(start_h);
    $(".element").css("font-size", start_f);
    
    $("#width").text("Print Width:  "+(parseInt(start_w)/100)+" inches");
    $("#height").text("Print Height: "+(parseInt(start_h)/100)+" inches");
    
    //vertical adjuster
    $( "#vslider" ).slider({
            min:50,
            value: 100,
          animate:"slow",
          orientation: "vertical",
          slide: function( event, ui ) {
                $("#height").text("Print Height: "+(4*ui.value/100)+" inches");

                $("#label_area").height(org_height*ui.value/100);

          },
          stop: function( event, ui ) {
                $.cookie('label_height',  $("#label_area").height());
          },
          create: function(event, ui){
                $(this).slider('value',(parseInt($("#label_area").height())/410*100));
          }
    });

    //horizonal adjuster
    $( "#hslider" ).slider({
           min:50,
          value: 100,
          slide: function( event, ui ) {
              $("#width").text("Print Width: "+(6*ui.value/100)+" inches");

              $("#label_area").width(org_width*ui.value/100);

          },
          stop: function( event, ui ) {
                $.cookie('label_width',  $("#label_area").width());
          },
          create: function(event, ui){
                $(this).slider('value', (parseInt($("#label_area").width())/610*100));
          }
    });
    
    //save last setting
    $("#set_cookie").click(function() {

       
       var size = $.cookie('test2');
       if (typeof size === "undefined") {
            size = 99999;
       }
       alert ("previous "+size);
       $.cookie('test2',  $("#label_area").width());

    });
    
    //make font bigger     
    $( "#bigger" ).click(function() {
        
        var size    = $(".element").css('font-size'); 
        var newsize = parseInt(size)+8;
        $(".element").css("font-size", newsize+"px"); 
        $.cookie('label_font',  $(".element").css('font-size'));
        
        
     }); 
     
    //make font smaler
    $( "#smaller" ).click(function() {
       var size = $(".element").css('font-size'); 
       if (parseInt(size)>12){
            var newsize = parseInt(size)-8;
             $(".element").width() 
            $(".element").css("font-size", newsize+"px"); 
        }
       
       
       $.cookie('label_font',  $(".element").css('font-size'));
     });  
           
    //sales order number entry  box
    $('#control').on('change', '#input_sono', function() {
        var id=$( "#input_sono" ).val();
        
        if (isNaN(id)||(id.length !== 6))  //make sure input is a number with 6 digits
        {
          alert("Valid Sales Order Numbers Are Listed On The Left Side");
          $( "#input_sono" ).val('');
        }else {
            
            get_address_by_sono(id);
        }
        
        
      

    });
    
     

    //assembly selected from list 
    $('#control').on('change', '.label_list', function() {
        
        
        var str = $('.label_list option:selected').val(); 
        //alert( str+" called" );
        
        
        get_address_by_sono(str);
        return true;
        
                  
                    
    });
    
    function get_address_by_sono(sono) {
        
        var dest="./remote/GetAddress.php?id="+sono;
       
        
        var jqxhr = $.post(dest, "", function(html) {
                    
                    var idx=html.indexOf('Error');
                    
                    if (idx ===-1){
                        $("#sono_now").text("SONO:  "+sono);
                        $(".element").html(html);
                        $("#server_msg").html("");
                    }else {
                        $("#server_msg").html(html);
                        $("#sono_now").text("SONO:  "+sono);
                        $(".element").html("");
                    }
        })
        .done(function(){
            $( "#input_sono" ).val("");
            
        });
        
       
                    
                    
                    
    };
    
    $('#detail').on('click', '#print_label', function() {
   
        //convert width and height to inches and font size to points
        
        var w = (parseInt($("#label_area").width())/100)+"in"; 
        var h = (parseInt($("#label_area").height())/100)+"in";
        
        var size = (parseInt($(".element").css('font-size'))*7.5/10) + "pt"; 
        //alert ("in print_label now w="+w+" h="+h+" size="+size);
       
        $("#label_area").css("font-size", size);
        $("#label_area").css("width", w);
        $("#label_area").css("height", h);
        
        
       window.print();
    });
    
    
    
});//function
