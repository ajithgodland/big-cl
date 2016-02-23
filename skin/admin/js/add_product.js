$( document ).ready(function() 
{
    $("#txtDefaultHtmlArea1").htmlarea();
});
 $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<p><input class="span9" id="lable3" placeholder="Label" style="float: left; width: 347px;" name="speci[specification_name][]" type="text" /><input class="span9" id="value3" placeholder="Value" style="float: left; position: relative; left: 9px; width: 352px;" name="speci[specification_value][]" type="text" /><button type="button" id="remScnt" class="btn btn-warning" style="float: left; margin-left: 19px;">Remove</button><div style="clear: both; height: 11px;"></div></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
    });