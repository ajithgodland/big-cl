<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->
                <div class="heading">
                    <h3>Manage Area</h3>  
                    
                    
                    <div class="resBtnSearch">
                <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
            </div>


            <div class="search">

                <input type="text" id="tipue_search_input" name="name" class="top-search" placeholder="Search here ..."
                       value="<?php if ($this->uri->segment(6) != '0') {
                           $vals = $this->uri->segment(6);
                           $typed = str_replace("-", " ", $vals);
                           $typed = str_replace("123", "&", $typed);
                           echo $typed;
                       }  ?>"/>
                <input type="submit" id="tipue_search_button" class="search-btn" value=""/>


            </div>
            <!-- End search -->                  
                    
                                    
                    
                </div><!-- End .heading-->
                
<div class="form-row row-fluid" style="width:100%; float:right ;">  


                
        

            
            
             
            
            
        
<div class="span12" style="width:40%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Region</label>
                                                    <div class="span8 controls regionlist">   
                                                        <select name="region" id="region"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Region" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php 
                                                                
																if($this->uri->segment(3) !='' & $this->uri->segment(3) != '0' & $this->uri->segment(3) != 'All')
																{
																	
																$cid = $this->uri->segment(3);
																
																
																$all_regions = $this->admin_model->get_location_lists2($cid);
                                                               
																	foreach ($all_regions as $rrow) {
																	?>
																	<option value="<?php echo $rrow->id; ?>" <?php if($this->uri->segment(8) == $rrow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($rrow->country); ?></option>
																	<?php
																	
																	} 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div>
            
                    <div class="span12" style="width:40%; float:right; margin-top:15px;">
                <div class="row-fluid">
                <label class="form-label span4" for="checkboxes">Select Country</label>
                <div class="span8 controls countrylist">   
                    <select name="country" id="country"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Country" required>                                                             
                       
                           <option value="All" >--Select--</option>
                            <?php
                            foreach($countries as $country)
                            {
                                ?>
                                <option value="<?php echo $country->id ; ?>" <?php if($this->uri->segment(3) == $country->id) {  echo 'selected'; }  ?> ><?php echo ucwords($country->country) ; ?></option>
                            <?php
                            }
                            ?>
                      </select>
               
                </div> 
            </div>
            </div>
            
            
            <div class="span12" style="width:40%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Zone</label>
                                                    <div class="span8 controls zonelist">   
                                                        <select name="zone" id="zone"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Zone" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php 
                                                                
																if($this->uri->segment(4) !='' & $this->uri->segment(4) != '0' & $this->uri->segment(4) != 'All')
																{
																	
																$cid = $this->uri->segment(4);
																
																
																$all_zones = $this->admin_model->get_location_lists2($cid);
                                                               
																	foreach ($all_zones as $rrow) {
																	?>
																	<option value="<?php echo $rrow->id; ?>" <?php if($this->uri->segment(9) == $rrow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($rrow->country); ?></option>
																	<?php
																	
																	} 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div>
            
            <div class="span12" style="width:40%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select State</label>
                                                    <div class="span8 controls statelist">   
                                                        <select name="state" id="state"  class="nostyle selectbox2" style="width:100%;" placeholder="Select State" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php 
                                                                
																if($this->uri->segment(8) !='' & $this->uri->segment(8) != '0' & $this->uri->segment(8) != 'All')
																{
																	
																$cid = $this->uri->segment(8);
																
																
																$all_states = $this->admin_model->get_location_lists2($cid);
                                                               
																	foreach ($all_states as $rrow) {
																	?>
																	<option value="<?php echo $rrow->id; ?>" <?php if($this->uri->segment(4) == $rrow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($rrow->country); ?></option>
																	<?php
																	
																	} 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div>
            
            
            <div class="form-row row-fluid" style="width:40%; float:right ;">
            <div class="span12">
                <div class="row-fluid">
                    <label class="form-label span4" for="checkboxes">Sort By Status</label>

                    <div class="span8 controls">
                        <select name="select" id="sort_status">
                            <option value="All">All Status</option>
                            
                            <option value="a" <?php if($this->uri->segment(5) == 'a') {  echo 'selected'; }  ?>>Active</option>
                            <option value="d" <?php if($this->uri->segment(5) == 'd') {  echo 'selected'; }  ?>>Not Active Yet</option>
                           
                        </select>
                    </div>
                </div>
            </div>
        </div>
            
            
            
            
                       <div class="span12" style="width:40%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select District</label>
                                                    <div class="span8 controls districtlist">   
                                                        <select name="district" id="district"  class="nostyle selectbox2" style="width:100%;" placeholder="Select District" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php 
                                                                
																if($this->uri->segment(9) !='' & $this->uri->segment(9) != '0' & $this->uri->segment(9) != 'All')
																{
																	
																$cid = $this->uri->segment(9);
																
																
																$all_district = $this->admin_model->get_locations($cid,'district');
                                                               
																	foreach ($all_district as $rrow) {
																	?>
																	<option value="<?php echo $rrow->id; ?>" <?php if($this->uri->segment(7) == $rrow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($rrow->location); ?></option>
																	<?php
																	
																	} 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div> 
            
            
            
            

</div>   
                
                  <a href="<?php echo base_url(); ?>catalog/viewlocations" class="btn btn-inverse"><span
                class="icon16 icomoon-icon-loop white"></span> View All</a><br><br>
                                        
                                                   
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box gradient">
                                <div class="title">
                                    <h4>
                                        <span>View Area</span>
                                    </h4>
                                </div>
                                <div class="content noPad clearfix">
                                
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>AREA</th>
                                              <th>DISTRICT</th>
                                              <th>ZONE</th>
                                                <th>STATE</th>
                                                <th>REGION</th>
                                                <th>COUNTRY</th>
                                                <th>STATUS</th>
                                                <th>DATE</th>
                                                <th>EDIT</th>
                                                <th>DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                 <?php
				$i=$page_position;
				//print_r($categories);
				foreach($values as $row)
				{
				 $i++;
				?>
                                            <tr class="odd gradeX">
                                              <td><?php echo $i; ?></td>
                                              <td><?php echo ucwords($row->location); ?></td>
                                              <td><?php
												$district_details = $this->admin_model->GetByRow('tb_locations', $row->parent_id, 'id');
												
												echo ucwords($district_details->location) ;
												
												 ?></td>
                                              <td><?php
												$zone_details = $this->admin_model->GetByRow('tb_country', $row->zoneid, 'id');
												
												echo $zone_details->country ;
												
												 ?></td>
                                                <td><?php
												$state_details = $this->admin_model->GetByRow('tb_country', $row->state, 'id');
												
												echo $state_details->country ;
												
												 ?></td>
                                                <td><?php
												$region_details = $this->admin_model->GetByRow('tb_country', $row->regionid, 'id');
												
												echo $region_details->country ;
												
												 ?></td>
                                                <td><?php
												$country_details = $this->admin_model->GetByRow('tb_country', $row->country, 'id');
												
												echo $country_details->country ;
												
												 ?></td>
                                                <td class="center"><?php
												
												if($row->status == 'a')
												{
												  echo 'Active';
												}
												else
												{													
												  echo 'Not Active Yet' ;
												}
												
												 ?></td>
                                                <td class="center"><?php echo $row->date ; ?></td>
                                                
                                                <td class="center"> <a href="<?php echo base_url();?>catalog/editlocation/<?php echo $row->id.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5). '/' . $this->uri->segment(6). '/' . $this->uri->segment(7). '/' . $this->uri->segment(8). '/' . $this->uri->segment(9). '/' . $this->uri->segment(10). '/' . $this->uri->segment(11) ;?>" title="Edit Area" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a></td>
                                                <td class="center"><a href="#" title="Remove Area" class="tip" onClick="linkRef('<?php echo base_url();?>catalog/deletelocation/<?php echo $row->id.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5). '/' . $this->uri->segment(6). '/' . $this->uri->segment(7). '/' . $this->uri->segment(8). '/' . $this->uri->segment(9). '/' . $this->uri->segment(10). '/' . $this->uri->segment(11) ;?>')"><span class="icon12 icomoon-icon-remove"></span></a></td>                 
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

if($this->uri->segment(3) !='' & $this->uri->segment(3) != '0' & $this->uri->segment(3) != 'All')
{

$seg_3 = $this->uri->segment(3);

}
else
{
$seg_3 = 0;	
}


if($this->uri->segment(4) !='' & $this->uri->segment(4) != '0' & $this->uri->segment(4) != 'All')
{

$seg_4 = $this->uri->segment(4);

}
else
{
$seg_4 = 0;	
}



if($this->uri->segment(5) !='' & $this->uri->segment(5) != '0' & $this->uri->segment(5) != 'All')
{

$seg5 = $this->uri->segment(5);

}
else
{
$seg5 = 0;	
}



if($this->uri->segment(6) != '0')
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


if($this->uri->segment(8) !='' & $this->uri->segment(8) != '0' & $this->uri->segment(8) != 'All')
{

$seg8 = $this->uri->segment(8);

}
else
{
	
$seg8 = 0;	

}


if($this->uri->segment(9) !='' & $this->uri->segment(9) != '0' & $this->uri->segment(9) != 'All')
{

$seg9 = $this->uri->segment(9);

}
else
{
	
$seg9 = 0;	

}



?>





<script type="text/javascript">

    $(document).ready(function () {
        $("#country").change(function () {
            var id = $(this).val();
           
            window.location = '<?php echo base_url().'catalog/viewlocations/' ?>'+id+'<?php echo '/'.$seg_4.'/'.$seg5.'/'.$seg6.'/'.$seg7.'/'.$seg8.'/'.$seg9 ; ?>';


        });


        
    });
</script>




<script type="text/javascript">

    $(document).ready(function () {
		
        $("#state").change(function () {
            var id = $(this).val();


            window.location = '<?php echo base_url().'catalog/viewlocations/'.$seg_3.'/' ; ?>'+id+'<?php echo '/'.$seg5.'/'.$seg6.'/'.$seg7.'/'.$seg8.'/'.$seg9 ; ?>';


        });


        
    });
</script>


<script type="text/javascript">

    $(document).ready(function () {
        $("#sort_status").change(function () {
            var id = $(this).val();


           window.location = '<?php echo base_url().'catalog/viewlocations/'.$seg_3.'/'.$seg_4.'/' ; ?>'+id+'<?php echo '/'.$seg6.'/'.$seg7.'/'.$seg8.'/'.$seg9 ; ?>';


        });


        
    });
</script>






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


                window.location = '<?php echo base_url().'catalog/viewlocations/'.$seg_3.'/'.$seg_4.'/'.$seg5.'/' ; ?>'+total_name+'<?php echo '/'.$seg7.'/'.$seg8.'/'.$seg9 ; ?>';


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


                    window.location = '<?php echo base_url().'catalog/viewlocations/'.$seg_3.'/'.$seg_4.'/'.$seg5.'/' ; ?>'+total_name+'<?php echo '/'.$seg7.'/'.$seg8.'/'.$seg9 ; ?>';


                }

                else {

                    $("#tipue_search_input").focus();

                }

            }

        });


    });
</script>


<script type="text/javascript">

    $(document).ready(function () {
        $("#district").change(function () {
            var id = $(this).val();           
			
			window.location = '<?php echo base_url().'catalog/viewlocations/'.$seg_3.'/'.$seg_4.'/'.$seg5.'/'.$seg6.'/' ; ?>'+id+'<?php echo '/'.$seg8.'/'.$seg9 ; ?>';


        });


        
    });
</script>


<script type="text/javascript">

    $(document).ready(function () {
        $("#region").change(function () {
            var id = $(this).val();           
			
			window.location = '<?php echo base_url().'catalog/viewlocations/'.$seg_3.'/'.$seg_4.'/'.$seg5.'/'.$seg6.'/'.$seg7.'/' ; ?>'+id+'<?php echo '/'.$seg9 ; ?>';


        });


        
    });
</script>


<script type="text/javascript">

    $(document).ready(function () {
        $("#zone").change(function () {
            var id = $(this).val();           
			
			window.location = '<?php echo base_url().'catalog/viewlocations/'.$seg_3.'/'.$seg_4.'/'.$seg5.'/'.$seg6.'/'.$seg7.'/'.$seg8.'/' ; ?>'+id;


        });


        
    });
</script>


