<!DOCTYPE HTML>
<html>
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
    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Headings -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Text -->
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!-- Core stylesheets do not remove -->
    <link id="bootstrap" href="<?php echo base_url()?>skin/admin/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap-responsive" href="<?php echo base_url()?>skin/admin/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>skin/admin/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>skin/admin/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Plugin stylesheets -->
    <link href="<?php echo base_url()?>skin/admin/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/inputlimiter/jquery.inputlimiter.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/togglebutton/toggle-buttons.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/color-picker/color-picker.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/select/select2.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/validate/validate.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/smartWizzard/smart_wizard.css" type="text/css" rel="stylesheet" />
    <!-- Main stylesheets -->
    <link href="<?php echo base_url()?>skin/admin/css/main.css" rel="stylesheet" type="text/css" /> 
    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="<?php echo base_url()?>skin/admin/css/custom.css" rel="stylesheet" type="text/css" /> 
    <!--[if IE 8]><link href="<?php echo base_url()?>skin/admin/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/respond.min.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />
    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="application-name" content="Supr" /> 
    <meta name="msapplication-TileColor" content="#3399cc" /> 
    <!-- Load modernizr first -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/modernizr.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
     cite {color: red;}
    .selector {width: 637px !important;}
    .main-table-box {
    margin-top: 95px!important;
    }
    .filtering_form {
    position: relative!important;
    top: -262px!important;
}
    </style>
    </head>
    <body>
    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar" style="position: fixed;"></div>
    <?php echo $this->common->header()?><!-- End #header -->
    <div id="wrapper">
        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        <!--Sidebar collapse button-->  
        <div class="collapseBtn leftbar">
             <a href="#" class="tipR" title="Hide sidebar"><span class="icon12 minia-icon-layout"></span></a>
        </div>
        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <?php echo $this->common->sidebar()?><!-- End #sidebar -->
        <!--Body content-->
        <div id="content" class="clearfix">
            <?php echo $contents;?>
            <!-- End contentwrapper -->
        </div><!-- End #content -->
    </div><!-- End #wrapper -->
    <!-- Le javascript
    ================================================== -->
    <!-- Important plugins put in all pages -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/jRespond.min.js"></script>
    <!-- Charts plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->
    <!-- Misc plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/qtip/jquery.qtip.min.js"></script><!-- Custom tooltip plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/totop/jquery.ui.totop.min.js"></script> 
    <!-- Search plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/search/tipuesearch_data.js"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/search/tipuesearch.js"></script>
    <!-- Form plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/elastic/jquery.elastic.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/inputlimiter/jquery.inputlimiter.1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/maskedinput/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/togglebutton/jquery.toggle.buttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/globalize/globalize.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/color-picker/colorpicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/timeentry/jquery.timeentry.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/select/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/dualselect/jquery.dualListBox-1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/tiny_mce/jquery.tinymce.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/supr-theme/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/supr-theme/jquery-ui-sliderAccess.js"></script>
    <!-- Init plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/main.js"></script><!-- Core js functions -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/forms.js"></script><!-- Init plugins only for page -->
    <!--<script type="text/javascript" src="<?php echo base_url()?>skin/admin/area/scripts/jquery-ui-1.7.2.custom.min.js"></script>-->
    <link rel="Stylesheet" type="text/css" href="<?php echo base_url()?>skin/admin/area/style/jqueryui/ui-lightness/jquery-ui-1.7.2.custom.css" />

    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/area/scripts/jHtmlArea-0.8.js"></script>
    <link rel="Stylesheet" type="text/css" href="<?php echo base_url()?>skin/admin/area/style/jHtmlArea.css" />
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/add_category.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/attribute.js"></script>
    </body>
</html>