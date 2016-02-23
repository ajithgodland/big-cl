<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->
                <div class="heading">
                    <h3>Manage Daily Visit Report &nbsp;&nbsp; > &nbsp;&nbsp;<span style="color:#AF3600">Salesman : <?php echo ucwords($userdetails->s_firstname).' '.ucwords($userdetails->s_lastname) ;?></span></h3>   
                     
                    
                    
                    <div class="resBtnSearch">
                <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
            </div>


            <div class="search">

                <input type="text" id="tipue_search_input" name="name" class="top-search" placeholder="Search here ..."
                       value="<?php if ($this->uri->segment(7) != '0') {
                           $vals = $this->uri->segment(7);
                           $typed = str_replace("-", " ", $vals);
                           $typed = str_replace("123", "&", $typed);
                           echo $typed;
                       }  ?>"/>
                <input type="submit" id="tipue_search_button" class="search-btn" value=""/>


            </div>
            <!-- End search --> 
                                    
                    
                </div><!-- End .heading-->
                
                
                 <?php
				$back_url = $this->uri->segment(5);
				$back_url = str_replace('_','/',$back_url);
				?>
                
                <a href="<?php echo base_url().'catalog/dayvisitreport/'.$back_url ; ?>" style="float:right; margin-top:1%; margin-bottom:5px;" class="btn btn-warning btn-mini">Back</a>
                
                <?php /*?><div class="form-row row-fluid" style="width:100%; float:right ;">  



             <div class="form-row row-fluid" style="width:25%; float:right ;">
            <div class="span12">
                <div class="row-fluid">
                    <label class="form-label span4" for="checkboxes">Sort By Status</label>

                    <div class="span8 controls">
                        <select name="select" id="sort_status">
                            <option value="All">All Status</option>
                            
                            <option value="yes" <?php if($this->uri->segment(6) == 'yes') {  echo 'selected'; }  ?>>Visited Shops</option>
                            <option value="no" <?php if($this->uri->segment(6) == 'no') {  echo 'selected'; }  ?>>Not Visited Shops</option>
                           
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        
        
     
            
</div><?php */?>
  
                
                  
             <a href="<?php echo base_url(); ?>catalog/dayvisitlocationshops/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ;?>" class="btn btn-inverse"><span
                class="icon16 icomoon-icon-loop white"></span> View All</a>  
                                            
                                                    
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box gradient">
                                <div class="title">
                                    <h4>
                                        <span>Visited Centre <span style="color:#AF3600;">></span> <?php echo ucwords($centre_details->location) ; ?> <span style="color:#AF3600;">></span> View Shops</span>
                                        <span style="color:#AF3600; float:right;">Date : <?php echo date('d-M-Y', strtotime($daydata->date)) ; ?>&nbsp;&nbsp;&nbsp;</span>
                                        
                                    </h4>
                                </div>
                                <div class="content noPad clearfix">
                                
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>NAME</th>
                                                <th>PHONE</th>
                                                <th>EMAIL</th>
                                                <th>ADDRESS</th>
                                                <th>LOCATION</th>
                                                <th>STATUS</th>
                                                <th>CHECKIN</th>
                                                <th>CHECKOUT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                 <?php
				$i=$page_position;
				//print_r($categories);
				foreach($values as $row)
				{
				 $i++;
				 
				 
				 $shop_details =  $this->admin_model->GetByRow('tb_shops', $row->shopid , 'id');
				 
				?>
                                            <tr class="odd gradeX">
                                              <td><?php echo $i; ?></td>
                                              <td><?php echo $shop_details->name; ?></td>
                                                <td><?php echo $shop_details->phone ; ?></td>
                                                <td><?php echo $shop_details->email ; ?></td>
                                                <td><?php echo $shop_details->address ; ?></td>
                                                <td><?php
												$centre_details = $this->admin_model->GetByRow('tb_locations', $shop_details->centreid, 'id');
												
												echo $centre_details->location ;
												
												 ?>, <?php
												$area_details = $this->admin_model->GetByRow('tb_locations', $shop_details->areaid, 'id');
												
												echo $area_details->location ;
												
												 ?>, <?php
												$district_details = $this->admin_model->GetByRow('tb_locations', $shop_details->district, 'id');
												
												echo $district_details->location ;
												
												 ?>, <br> <?php
												$zone_details = $this->admin_model->GetByRow('tb_country', $shop_details->zoneid, 'id');
												
												echo $zone_details->country ;
												
												 ?>, <?php
												$state_details = $this->admin_model->GetByRow('tb_country', $shop_details->state, 'id');
												
												echo $state_details->country ;
												
												 ?>, <?php
												$region_details = $this->admin_model->GetByRow('tb_country', $shop_details->regionid, 'id');
												
												echo $region_details->country ;
												
												 ?>, <?php
												$country_details = $this->admin_model->GetByRow('tb_country', $shop_details->country, 'id');
												
												echo $country_details->country ;
												
												 ?></td>
                                                <td><?php
												if($row->status=='yes')
												{
													echo 'Visited';
												}
												 ?></td>
                                                <td><?php
												if($row->checkin1=='yes')
												{
													echo date('d-M-Y h:i:s a', strtotime($row->checkin)) ;
												}
												 ?></td>
                                                <td><?php
												if($row->checkout1=='yes')
												{
													echo date('d-M-Y h:i:s a', strtotime($row->checkout)) ;
												}
												 ?></td>
                                           </tr>
                                           
									   <?php
                                                    
                                        }
                                        ?>
                                            
                                           
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div><!-- End .box -->
                        </div><!-- End .span12 -->
                        
                        
                        <div class="pagination_wrapper">
                             <div class="pagination_wrapper-cover">     
                                     <div id="pagination">  <?php echo $pagination; ?>  </div>        
                             </div>
                   	   </div>
                       
                    </div><!-- End .row-fluid -->
                   
               
    			
    				
                
                
            </div><!-- End contentwrapper -->
        </div>
        
                <?php if($this->session->flashdata('message'))
		 {
		 ?>
   	 	<script type="application/javascript"> 
			$(document).ready(function() {
				//Regular success
				
					$.pnotify({
						type: 'success',
						title: '<?php echo $this->session->flashdata('message') ;?>',
						text: '',
						icon: 'picon icon16 iconic-icon-check-alt white',
						opacity: 0.95,
						history: false,
						sticker: false
					});
				
			});
		</script>
        <?php
		}
		?>  
        
        
<script type="text/javascript">
function linkRef(yurl ){
var linkref = yurl;
if(confirm("do you really want to Delete ?")){
window.location.href=linkref;
}
}
</script>



<?php

$seg3 = $this->uri->segment(3);

$seg4 = $this->uri->segment(4);

$seg5 = $this->uri->segment(5);


if($this->uri->segment(6) !='' & $this->uri->segment(6) != '0' & $this->uri->segment(6) != 'All')
{

$seg6 = $this->uri->segment(6);

}
else
{
$seg6 = 0;	
}


if($this->uri->segment(7) !='' & $this->uri->segment(7) != '0' & $this->uri->segment(7) != 'All')
{

$seg7 = $this->uri->segment(7);

}
else
{
$seg7 = 0;	
}


?>



<?php /*?><script type="text/javascript">

    $(document).ready(function () {
        $("#sort_status").change(function () {
            var id = $(this).val();           
			
			window.location = '<?php echo base_url().'catalog/dayvisitlocationshops/'.$seg3.'/'.$seg4.'/'.$seg5.'/'; ?>'+id+'<?php echo '/'.$seg7 ; ?>';


        });


        
    });
</script><?php */?>


<script type="application/javascript">

    $(document).ready(function () {


        $("#tipue_search_button").click(function () {


            if ($("#tipue_search_input").val() != '') {

                var name = $("#tipue_search_input").val();


                var name1 = name.replace("'", "");

                var name2 = name1.replace('"', '');

                var name3 = name2.replace('/', '');

                var name4 = name3.replace('&', '123');

                var splted = name4.split(" ");


                var splite_count = splted.length;


                var search_value = '';


                for (var i = 0; i < splite_count; i++) {

                    search_value += splted[i] + '-';

                }


                var total_name = search_value.substring(0, search_value.length - 1);


                window.location = '<?php echo base_url().'catalog/dayvisitlocationshops/'.$seg3.'/'.$seg4.'/'.$seg5.'/'.$seg6.'/' ; ?>'+total_name;


            }

            else {

                $("#tipue_search_input").focus();

            }


        });


    });
</script>


<script type="application/javascript">

    $(document).ready(function () {


        $("#tipue_search_input").keyup(function (e) {

            if (e.which == 13) {


                if ($("#tipue_search_input").val() != '') {

                    var name = $("#tipue_search_input").val();


                    var name1 = name.replace("'", "");

                    var name2 = name1.replace('"', '');

                    var name3 = name2.replace('/', '');

                    var name4 = name3.replace('&', '123');

                    var splted = name4.split(" ");


                    var splite_count = splted.length;


                    var search_value = '';


                    for (var i = 0; i < splite_count; i++) {

                        search_value += splted[i] + '-';

                    }


                    var total_name = search_value.substring(0, search_value.length - 1);


                     window.location = '<?php echo base_url().'catalog/dayvisitlocationshops/'.$seg3.'/'.$seg4.'/'.$seg5.'/'.$seg6.'/' ; ?>'+total_name;


                }

                else {

                    $("#tipue_search_input").focus();

                }

            }

        });


    });
</script>







