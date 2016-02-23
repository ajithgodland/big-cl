$( document ).ready(function() 
{
    $("#txtDefaultHtmlArea").htmlarea();
});
$( document ).ready(function() {
        var vali= $("#add_category").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'category/add_categories',
                    data:$("#add_category input,#add_category select,#add_category textarea").serialize(),//only input
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = '../category';
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

$( document ).ready(function() {
        var vali= $("#edit_category").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#qLbar').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'category/editcategory',
                    data:$("#edit_category input,#edit_category select,#edit_category textarea").serialize(),//only input
                    success: function(response)
                    {
                        $('#qLbar').hide();
                        $("#message").html();
                        var repage = 'index.php/dashboard';
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