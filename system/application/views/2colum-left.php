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
    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <!-- Headings -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
    <!-- Text -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> 
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
    <!-- Plugins stylesheets -->
    <link href="<?php echo base_url()?>skin/admin/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>skin/admin/plugins/misc/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>skin/admin/plugins/misc/search/tipuesearch.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
    <?php echo $this->common->header()?>
    <!-- End #header -->
    <div id="wrapper">
        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        <!--Left Sidebar collapse button-->  
        <div class="collapseBtn leftbar">
             <a href="#" class="tipR" title="Hide Left Sidebar"><span class="icon12 minia-icon-layout"></span></a>
        </div>
        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <?php echo $this->common->sidebar()?>
        <!-- End #sidebar -->
        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->
                <div class="heading">
                    <h3>Dashboard</h3>                    
                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>
                    <div class="search">
                        <form id="searchform" action="search.html" />
                            <input type="text" id="tipue_search_input" class="top-search" placeholder="Search here ..." />
                            <input type="submit" id="tipue_search_button" class="search-btn" value="" />
                        </form>
                    </div><!-- End search -->
                    <ul class="breadcrumb">
                        <li>You are here:</li>
                        <li>
                            <a href="#" class="tip" title="back to dashboard">
                                <span class="icon16 icomoon-icon-screen-2"></span>
                            </a> 
                            <span class="divider">
                                <span class="icon16 icomoon-icon-arrow-right-3"></span>
                            </span>
                        </li>
                        <li class="active">Dashboard</li>
                    </ul>
                </div><!-- End .heading-->
                <!-- Build page from here: -->
                <div class="row-fluid">
                    <div class="span8">
                        <div class="centerContent">
                            <ul class="bigBtnIcon">
                                <li>
                                    <a href="#" title="I`m with gradient" class="tipB">
                                        <span class="icon icomoon-icon-users"></span>
                                        <span class="txt">Users</span>
                                        <span class="notification">5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-support"></span>
                                        <span class="txt">Support tickets</span>
                                        <span class="notification blue">12</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="I`m with pattern" class="pattern tipB">
                                        <span class="icon icomoon-icon-bubbles-2"></span>
                                        <span class="txt">New Comments</span>
                                        <span class="notification green">23</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-basket"></span>
                                        <span class="txt">Orders</span>
                                        <span class="notification">+5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-history"></span>
                                        <span class="txt">Backups</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-meter-fast"></span>
                                        <span class="txt">Site Usage</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- End .span8 -->
                    <div class="span4">
                        <div class="centerContent">
                            <div dir="ltr" class="circle-stats">
                                <div class="circular-item tipB" title="Site overload">
                                    <span class="icon icomoon-icon-fire"></span>
                                    <input type="text" value="62" class="redCircle" />
                                </div>
                                <div class="circular-item tipB" title="Site average load time">
                                    <span class="icon icomoon-icon-busy"></span>
                                    <input type="text" value="12" class="blueCircle" />
                                </div>
                                <div class="circular-item tipB" title="Target complete">
                                    <span class="icon icomoon-icon-target-2"></span>
                                    <input type="text" value="94" class="greenCircle" />
                                </div>
                            </div>
                        </div>
                    </div><!-- End .span4 -->
                </div><!-- End .row-fluid -->
                <div class="row-fluid">
                    <div class="span8">
                        <div class="box chart gradient">
                            <div class="title">
                                <h4>
                                    <span class="icon16 icomoon-icon-bars"></span>
                                    <span>Visitors Chart</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content" style="padding-bottom:0;">
                               <div class="visitors-chart" style="height: 230px;width:100%;margin-top:15px; margin-bottom:15px;"></div>
                               <ul class="chartShortcuts">
                                    <li>
                                        <a href="#">
                                            <span class="head">Total Visits</span>
                                            <span class="number">509</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="head">Uniqiue Visits</span>
                                            <span class="number">309</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="head">External Visits</span>
                                            <span class="number">109</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="head">Impressions</span>
                                            <span class="number">325</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- End .box -->
                    </div><!-- End .span8 -->
                    <div class="span4">
                        <div class="sparkStats">
                            <h4>389 people visited this site <a href="#" class="icon tip" title="Configure"><span class="icon16 icomoon-icon-cog-2"></span></a></h4>
                            <ul class="unstyled">
                                <li><span class="sparkLine1 "></span> Visits: <span class="number">509</span></li>
                                <li>
                                    <span class="sparkLine2"></span>
                                    Unique Visitors: 
                                    <span class="number">389</span>
                                </li>
                                <li><span class="sparkLine3"></span> 
                                    Pageviews: 
                                    <span class="number">731</span>
                                </li>
                                <li><span class="sparkLine4"></span>
                                    Pages / Visit: 
                                    <span class="number">1.44</span>
                                </li>
                                <li><span class="sparkLine5"></span>
                                    Avg. Visit Duration: 
                                    <span class="number">00:01:21</span>
                                </li>
                                <li><span class="sparkLine6"></span>
                                    Bounce Rate: <span class="number">68.37%</span>
                                </li>
                                <li><span class="sparkLine7"></span>
                                    % New Visits: 
                                    <span class="number">76.23%</span>
                                </li>
                            </ul>
                            <div class="right" style="padding: 15px 0">
                                <a href="charts.html" class="btn btn-info">View full statistic <span class="icon16 icomoon-icon-arrow-right-3 white"></span></a>
                            </div>
                        </div><!-- End .sparkStats -->
                    </div><!-- End .span4 -->
                </div><!-- End .row-fluid -->
                <div class="row-fluid">
                    <div class="span4">
                        <div class="box gradient">
                            <div class="title">
                                <h4>
                                    <span class="icon16 icomoon-icon-pie"></span>
                                    <span>Visitors overview</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content">
                               <div class="pieStats" style="height: 240px; width:100%;">
                                </div>
                            </div>
                        </div><!-- End .box -->
                    </div><!-- End .span4 -->
                    <div class="span4">
                        <div class="box gradient">
                            <div class="title">
                                <h4>
                                    <span class="icon16 icomoon-icon-thumbs-up"></span>
                                    <span>Vital Stats  <span class="label label-success"><span class="icomoon-icon-arrow-up-2 white"></span>1268</span></span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content">
                                <div class="vital-stats" style="padding-bottom:23px">
                                    <ul class="unstyled">
                                        <li>
                                            <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 81% Clicks
                                            <span class="pull-right strong">567</span>
                                            <div class="progress progress-striped ">
                                                <div class="bar" style="width: 81%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 72% Uniquie Clicks
                                            <span class="pull-right strong">507</span>
                                            <div class="progress progress-success progress-striped ">
                                                <div class="bar" style="width: 72%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="icon24 icomoon-icon-arrow-down-2 red"></span> 53% Impressions
                                            <span class="pull-right strong">457</span>
                                            <div class="progress progress-warning progress-striped ">
                                                <div class="bar" style="width: 53%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="icon24 icomoon-icon-arrow-up-2 green"></span> 3% Online Users
                                            <span class="pull-right strong">8</span>
                                            <div class="progress progress-danger progress-striped ">
                                                <div class="bar" style="width: 3%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- End .box -->  
                    </div><!-- End .span4 -->
                    <div class="span4">
                        <div class="reminder">
                            <h4>Things you need to do 
                                <a href="#" class="icon tip" title="Configure"><span class="icon16 icomoon-icon-cog-2"></span></a>
                            </h4>
                            <ul>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-basket gray"></span>
                                    </div>
                                    <span class="number">7</span> 
                                    <span class="txt">Pending Orders</span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-support red"></span>
                                    </div>
                                    <span class="number">3</span> 
                                    <span class="txt">Support Tickets </span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-new green"></span>
                                    </div>
                                    <span class="number">5</span> 
                                    <span class="txt">New Invoices </span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-bubbles-2 blue"></span>
                                    </div>
                                    <span class="number">13</span> 
                                    <span class="txt">Review Comments</span> 
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-cog dark"></span>
                                    </div>
                                    <span class="number">2</span> 
                                    <span class="txt">Settings to Change </span>
                                    <a class="btn btn-warning">go</a>
                                </li>                                   
                            </ul>
                        </div><!-- End .reminder -->
                    </div><!-- End .span4 -->
                </div><!-- End .row-fluid -->
                <div class="row-fluid">
                    <div class="span8">
                        <div class="box calendar gradient">
                            <div class="title">
                                <h4>
                                    <span class="icon16 icomoon-icon-calendar"></span>
                                    <span>Calendar</span>
                                </h4>
                                <!-- <a href="#" class="minimize">Minimize</a> -->
                            </div>
                            <div class="content noPad"> 
                                <div id="calendar">
                                </div>
                            </div>
                        </div><!-- End .box -->  
                    </div><!-- End .span8 --> 
                    <div class="span4">
                        <div class="todo">
                            <h4>To Do List <a href="#" class="icon tip" title="Add task"><span class="icon16 icomoon-icon-plus"></span></a></h4>
                            <ul>
                                <li class="clearfix">
                                    <div class="txt">
                                        Fix some bugs
                                        <span class="by label">Admin</span>
                                        <span class="date badge badge-important">Today</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Add post about birds
                                        <span class="by label">Julia</span>
                                        <span class="date badge badge-success">Tomorrow</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Remove some items
                                        <span class="by label">Admin</span>
                                        <span class="date badge badge-success">Tomorrow</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Staff party
                                        <span class="by label">Admin</span>
                                        <span class="date badge badge-info">08.08.2012</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Shedule backup
                                        <span class="by label">Steve</span>
                                        <span class="date badge badge-info">08.08.2012</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- End .span4 -->
                    <div class="span4">
                        <div class="box gradient">
                            <div class="title">
                                <h4>
                                    <span class="icon16 icomoon-icon-bubbles-6"></span>
                                    <span>Messages layout</span>
                                </h4>
                            </div>
                            <div class="content noPad">
                                <ul class="messages">
                                    <li class="user clearfix">
                                        <a href="#" class="avatar">
                                            <img src="images/avatar2.jpeg" alt="user" />
                                        </a>
                                        <div class="message">
                                            <div class="head clearfix">
                                                <span class="name"><strong>Lazar</strong> says:</span>
                                                <span class="time">25 seconds ago</span>
                                            </div>
                                            <p>
                                                Time to go i call you tomorrow.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="admin clearfix">
                                        <a href="#" class="avatar">
                                            <img src="images/avatar3.jpeg" alt="user" />
                                        </a>
                                        <div class="message">
                                            <div class="head clearfix">
                                                <span class="name"><strong>Sugge</strong> says:</span>
                                                <span class="time">just now</span>
                                            </div>
                                            <p>
                                                OK, have a nice day.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="sendMsg">
                                        <form class="form-horizontal" action="#" />
                                            <textarea class="elastic" id="textarea" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                            <button type="submit" class="btn btn-info marginT10">Send message</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- End .box -->
                    </div><!-- End .span4 -->
                </div><!-- End .row-fluid -->
                <div class="modal fade hide" id="myModal1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="icon12 minia-icon-close"></span></button>
                        <h3>Chat layout</h3>
                    </div>
                    <div class="modal-body">
                        <ul class="messages">
                            <li class="user clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar2.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Lazar</strong> says:</span>
                                        <span class="time">25 seconds ago</span>
                                    </div>
                                    <p>
                                        Time to go i call you tomorrow.
                                    </p>
                                </div>
                            </li>
                            <li class="admin clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar3.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Sugge</strong> says:</span>
                                        <span class="time">just now</span>
                                    </div>
                                    <p>
                                        OK, have a nice day.
                                    </p>
                                </div>
                            </li>
                            <li class="sendMsg">
                                <form class="form-horizontal" action="#" />
                                    <textarea class="elastic" id="textarea1" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                    <button type="submit" class="btn btn-info marginT10">Send message</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    </div><!-- End #wrapper -->
    <!-- Le javascript
    ================================================== -->
    <!-- Important plugins put in all pages -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/jRespond.min.js"></script>
    <!-- Charts plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/charts/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/charts/flot/jquery.flot.grow.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/charts/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/charts/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/charts/flot/jquery.flot.tooltip_0.4.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/charts/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/charts/knob/jquery.knob.js"></script><!-- Circular sliders and stats -->
    <!-- Misc plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/fullcalendar/fullcalendar.min.js"></script><!-- Calendar plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/qtip/jquery.qtip.min.js"></script><!-- Custom tooltip plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/totop/jquery.ui.totop.min.js"></script> <!-- Back to top plugin -->
    <!-- Search plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/search/tipuesearch_data.js"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/search/tipuesearch.js"></script>
    <!-- Form plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/uniform/jquery.uniform.min.js"></script>
    <!-- Init plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/main.js"></script><!-- Core js functions -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/dashboard.js"></script><!-- Init plugins only for page -->
    </body>
</html>