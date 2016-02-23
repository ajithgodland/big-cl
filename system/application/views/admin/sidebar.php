<div id="sidebar">
            <div class="shortcuts">
                <ul>
                    <li><a href="support.html" title="Support section" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                    <li><a href="#" title="Database backup" class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                    <li><a href="charts.html" title="Sales statistics" class="tip"><span class="icon24 icomoon-icon-pie-2"></span></a></li>
                    <li><a href="#" title="Write post" class="tip"><span class="icon24 icomoon-icon-pencil"></span></a></li>
                </ul>
            </div><!-- End search -->            
            <div class="sidenav">
                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">Navigation</h5>
                </div><!-- End .sidenav-widget -->
                <div class="mainnav">
                    <ul>
                        <li>
                            <a href="#"><span class="icon16 icomoon-icon-list-2"></span>Manage Categories</a>
                            <?php if($this->uri->segment(1)=='category'){$cate_disp ='display: block;';}else{$cate_disp ='';}?>
                            <ul class="sub" style="<?php echo $cate_disp?>">
                                <li><a href="<?php echo base_url();?>index.php/category"><span class="icon16 icomoon-icon-file"></span>List Categories</a></li>
                                <li><a href="<?php echo base_url();?>index.php/category/add_categories"><span class="icon16 icomoon-icon-file"></span>Add Category</a></li>
                            </ul>
                        </li>
                        <!--<li>
                            <a href="#"><span class="icon16 icomoon-icon-list-2"></span>Manage Products</a>
                            <?php if($this->uri->segment(1)=='products'){$pro_disp ='display: block;';}else{$pro_disp ='';}?>
                            <ul class="sub" style="<?php echo $pro_disp?>">
                                <li><a href="<?php echo base_url();?>index.php/products"><span class="icon16 icomoon-icon-file"></span>List Products</a></li>
                                <li><a href="<?php echo base_url();?>index.php/products/add_product"><span class="icon16 icomoon-icon-file"></span>Add Product</a></li>
                            </ul>
                        </li>-->
                        <li>
                            <a href="javascript:void(0)"><span class="icon16 icomoon-icon-list-2"></span>Attributes</a>
                            <?php if($this->uri->segment(1)=='attribut'){$attri_disp ='display: block;';}else{$attri_disp ='';}?>
                            <ul class="sub" style="<?php echo $attri_disp?>">
                                <li style="width: 210px;">
                                    <a href="javascript:void(0)"><span class="icon16 icomoon-icon-file"></span>Manage Attributes</a>
                                     <ul class="sub" style="<?php echo $attri_disp?>">
                                        <li><a href="<?php echo base_url();?>index.php/attribut"><span class="icon16 icomoon-icon-arrow-right-3"></span>List Attributes</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/attribut/add_attribut"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add Attributes</a></li>
                                    </ul>
                                </li>
                                <li style="width: 210px;">
                                    <a href="javascript:void(0)"><span class="icon16 icomoon-icon-file"></span>Attributes Set</a>
                                     <ul class="sub" style="<?php echo $attri_disp?>">
                                        <li><a href="<?php echo base_url();?>index.php/attribut/attribut_set"><span class="icon16 icomoon-icon-arrow-right-3"></span>List Attributes</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/attribut/add_attribut_set"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add Attributes</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="icon16 icomoon-icon-list-2"></span>Manage Locations</a>
                            <?php if($this->uri->segment(1)=='catalog'){$loc_disp ='display: block;';}else{$loc_disp ='';}?>
                            <ul class="sub" style="<?php echo $loc_disp?>">
                                <li><a href="#"><span class="icon16 icomoon-icon-file"></span>Manage Country</a>
                                    <ul class="sub" style="<?php echo $loc_disp?>">
                                        <li><a href="<?php echo base_url();?>index.php/catalog/viewcountry"><span class="icon16 icomoon-icon-arrow-right-3"></span>List Countries</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/catalog/addcountry"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add Country</a></li>
                                    </ul>

                                </li>
                                <li><a href="#"><span class="icon16 icomoon-icon-file"></span>Manage Regions</a>
                                    <ul class="sub" style="<?php echo $loc_disp?>">
                                        <li><a href="<?php echo base_url();?>index.php/catalog/viewregion"><span class="icon16 icomoon-icon-arrow-right-3"></span>List Regions</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/catalog/addregion"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add Region</a></li>
                                    </ul>

                                </li>
                                <li><a href="#"><span class="icon16 icomoon-icon-file"></span>Manage States</a>
                                    <ul class="sub" style="<?php echo $loc_disp?>">
                                        <li><a href="<?php echo base_url();?>index.php/catalog/viewstate"><span class="icon16 icomoon-icon-arrow-right-3"></span>List States</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/catalog/addstate"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add State</a></li>
                                    </ul>

                                </li>
                                <li><a href="#"><span class="icon16 icomoon-icon-file"></span>Manage Zones</a>
                                    <ul class="sub" style="<?php echo $loc_disp?>">
                                        <li><a href="<?php echo base_url();?>index.php/catalog/viewzone"><span class="icon16 icomoon-icon-arrow-right-3"></span>List zones</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/catalog/addzone"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add Zone</a></li>
                                    </ul>

                                </li>
                            </ul>
                        </li>
                        <li><a href="typo.html"><span class="icon16 icomoon-icon-font"></span>Typography</a></li>
                        <li><a href="grid.html"><span class="icon16 icomoon-icon-grid"></span>Grid</a></li>
                        <li><a href="calendar.html"><span class="icon16 icomoon-icon-calendar"></span>Calendar</a></li>
                        <li>
                            <a href="widgets.html"><span class="icon16 icomoon-icon-cube"></span>Widgets<span class="notification green">35</span></a>
                        </li>
                        <li><a href="file.html"><span class="icon16 icomoon-icon-upload"></span>File Manager</a></li>
                        <li>
                            <a href="#"><span class="icon16 icomoon-icon-file"></span>Error pages<span class="notification">6</span></a>
                            <ul class="sub">
                                <li><a href="403.html"><span class="icon16 icomoon-icon-file"></span>Error 403</a></li>
                                <li><a href="404.html"><span class="icon16 icomoon-icon-file"></span>Error 404</a></li>
                                <li><a href="405.html"><span class="icon16 icomoon-icon-file"></span>Error 405</a></li>
                                <li><a href="500.html"><span class="icon16 icomoon-icon-file"></span>Error 500</a></li>
                                <li><a href="503.html"><span class="icon16 icomoon-icon-file"></span>Error 503</a></li>
                                <li><a href="offline.html"><span class="icon16 icomoon-icon-file"></span>Offline page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="icon16 icomoon-icon-folder"></span>Other pages<span class="notification blue">11</span></a>
                            <ul class="sub">
                                <li><a href="invoice.html"><span class="icon16 icomoon-icon-file"></span>Invoice page</a></li>
                                <li><a href="profile.html"><span class="icon16 icomoon-icon-file"></span>User profile</a></li>
                                <li><a href="search.html"><span class="icon16 icomoon-icon-search-3"></span>Search page</a></li>
                                <li><a href="email.html"><span class="icon16 icomoon-icon-envelop"></span>Email page</a></li>
                                <li><a href="support.html"><span class="icon16  icomoon-icon-support"></span>Support page</a></li>
                                <li><a href="faq.html"><span class="icon16 icomoon-icon-attachment"></span>FAQ page</a></li>
                                <li><a href="structure.html"><span class="icon16 icomoon-icon-file"></span>Blank page</a></li>
                                <li><a href="fixed-topbar.html"><span class="icon16 icomoon-icon-file"></span>Fixed topbar</a></li>
                                <li><a href="right-sidebar.html"><span class="icon16 icomoon-icon-file"></span>Right sidebar</a></li>
                                <li><a href="two-sidebars.html"><span class="icon16 icomoon-icon-file"></span>Two sidebars</a></li>
                                <li><a href="drag.html"><span class="icon16 icomoon-icon-move"></span>Drag &amp; Drop <span class="notification red">new</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- End sidenav -->
        </div>