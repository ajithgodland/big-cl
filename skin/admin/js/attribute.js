$( document ).ready(function() {
        var vali= $("#add_attribute").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'attribut/add_attribut',
                    data:$("#add_attribute input,#add_attribute select,#add_attribute textarea").serialize(),//only input
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = '../attribut';
                        if(response.trim()=='r')
                        {
                            window.location=repage;
                        }
                        else
                        {
                            $("#message").html(response);
                        }
                    }      
                });
            }
        });
});
function valide_code()
{
    var str = $('#attribute_code').val();
    strori = str.replace(/\s+/g, '_').toLowerCase();
    $('#attribute_code').val(strori)
}
 $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents div').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<div id="rem"><input class="span9" id="lable3" placeholder="Value" style="float: left; width: 32%;" name="option[option_value][]" type="text" /><input class="span9" id="value3" placeholder="Position" style="float: left; position: relative; left: 9px; width: 32%;" name="option[option_position][]" type="text" /><button type="button" id="remScnt" class="btn btn-warning" style="float: left; margin-left: 19px;">Remove</button><div style="clear: both; height: 11px;"></div></div>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 1 ) {
                        $(this).parents('#rem').remove();
                        i--;
                }
                return false;
        });
    });
 function options_li()
 {
   var option_val= $( "#option_val" ).val();
   if(option_val=='5' || option_val=='6')
   {
     $('#opt').show();
   }
   else
   {
     $('#opt').hide(); 
     $('#p_scents div').remove(); 
   }
 }
$( document ).ready(function() {
    var option_val= $( "#option_val" ).val();
   if(option_val=='5' || option_val=='6')
   {
     $('#opt').show();
   }
   else
   {
     $('#opt').hide(); 
     $('#p_scents div').remove(); 
   }
});
$( document ).ready(function() {
        var vali= $("#edit_attribute").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'attribut/edit_attribute',
                    data:$("#edit_attribute input,#edit_attribute select,#edit_attribute textarea").serialize(),//only input
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = '../attribut';
                        if(response.trim()=='r')
                        {
                            window.location=repage;
                        }
                        else
                        {
                            $("#message").html(response);
                        }
                    }      
                });
            }
        });
});
window.onload=function(){
$(document).ready(function () {
	$('.container .draggable-list').sortable({
	connectWith: '.container .draggable-list'
	});
});

}//]]> 
