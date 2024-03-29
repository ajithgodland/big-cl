<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title>Supr admin</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Force IE9 to render in normla mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Le styles -->
    <link href="<?php echo base_url()?>skin/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>skin/admin/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
    <!-- Main stylesheets -->
    <link href="<?php echo base_url()?>skin/admin/css/main.css" rel="stylesheet" type="text/css" /> 
    <!--[if IE 8]><link href="<?php echo base_url()?>skin/admin/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="js/libs/respond.min.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/modernizr.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body class="loginPage">
    <div class="container-fluid">
        <div id="header">
            <div class="row-fluid">
                <div class="navbar">
                    <div class="navbar-inner">
                      <div class="container">
                            <a class="brand" href="dashboard.html">Supr.<span class="slogan">admin</span></a>
                      </div>
                    </div><!-- /navbar-inner -->
                  </div><!-- /navbar -->
            </div><!-- End .row-fluid -->
        </div><!-- End #header -->
    </div><!-- End .container-fluid -->    
    <div class="container-fluid">
        <div class="loginContainer">
            <?php echo $contents;?>
        </div>
    </div><!-- End .container-fluid -->
    <!-- Le javascript
    ================================================== -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/js/jquery.validate.js"></script>
     <script type="text/javascript">
        // document ready function
        $(document).ready(function() {
            //------------- Options for Supr - admin tempalte -------------//
            var supr_Options = {
                rtl:false//activate rtl version with true
            }
            //rtl version
            if(supr_Options.rtl) {
                localStorage.setItem('rtl', 1);
                $('#bootstrap').attr('href', '<?php echo base_url()?>skin/admin/css/bootstrap/bootstrap.rtl.min.css');
                $('#bootstrap-responsive').attr('href', '<?php echo base_url()?>skin/admin/css/bootstrap/bootstrap-responsive.rtl.min.css');
                $('body').addClass('rtl');
                $('#sidebar').attr('id', 'sidebar-right');
                $('#sidebarbg').attr('id', 'sidebarbg-right');
                $('.collapseBtn').addClass('rightbar').removeClass('leftbar');
                $('#content').attr('id', 'content-one')
            } else {localStorage.setItem('rtl', 0);}
            $("input, textarea, select").not('.nostyle').uniform();
            $("#loginForm").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }  
                },
                messages: {
                    username: {
                        required: "Fill me please",
                        minlength: "My name is bigger"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "My password is more that 6 chars"
                    }
                }   
            });
        });
    </script> 
    <script type="text/javascript">
    $( document ).ready(function() {
        var vali= $("#adminlog").validate
        ({
            submitHandler: function(form) 
            {                                                       
                $("#message").empty(); 
                $('#loading').show(); 
   		        $.ajax({
                    type:"POST",
                    url:'admin/admin_login',
                    data:$("#adminlog input").serialize(),//only input
                    success: function(response)
                    {
                        $('#loading').hide();
                        $("#message").html();
                        var repage = '<?php echo base_url();?>index.php/dashboard';
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
    </script>
    </body>
</html>