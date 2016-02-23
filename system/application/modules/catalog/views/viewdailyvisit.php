<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->
                <div class="heading">
                    <h3>Manage Daily Visit Report</h3>  
                  
                </div><!-- End .heading-->
                
   <div class="form-row row-fluid" style="width:100%; float:right ;">  

            
                                 <div class="span12" style="width:25%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select State</label>
                                                    <div class="span8 controls statelist">   
                                                        <select name="state" id="state"  class="nostyle selectbox2" style="width:100%;" placeholder="Select State" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php 
                                                                
																if($this->uri->segment(5) !='' & $this->uri->segment(5) != '0' & $this->uri->segment(5) != 'All')
																{
																	
																$cid = $this->uri->segment(5);
																
																
																$all_states = $this->admin_model->get_location_lists2($cid);
                                                               
																	foreach ($all_states as $rrow) {
																	?>
																	<option value="<?php echo $rrow->id; ?>" <?php if($this->uri->segment(6) == $rrow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($rrow->country); ?></option>
																	<?php
																	
																	} 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div>
            
                        		<div class="span12" style="width:25%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Region</label>
                                                    <div class="span8 controls regionlist">   
                                                        <select name="region" id="region"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Region" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php 
                                                                
																if($this->uri->segment(4) !='' & $this->uri->segment(4) != '0' & $this->uri->segment(4) != 'All')
																{
																	
																$cid = $this->uri->segment(4);
																
																
																$all_regions = $this->admin_model->get_location_lists2($cid);
                                                               
																	foreach ($all_regions as $rrow) {
																	?>
																	<option value="<?php echo $rrow->id; ?>" <?php if($this->uri->segment(5) == $rrow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($rrow->country); ?></option>
																	<?php
																	
																	} 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div>
            
            
            
            <div class="span12" style="width:25%; float:right; margin-top:15px;">
                <div class="row-fluid">
                <label class="form-label span4" for="checkboxes">Select Country</label>
                <div class="span8 controls countrylist">   
                    <select name="country" id="country"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Country" required>                                                             
                       
                           <option value="All" >--Select--</option>
                            <?php
                            foreach($countries as $country)
                            {
                                ?>
                                <option value="<?php echo $country->id ; ?>" <?php if($this->uri->segment(4) == $country->id) {  echo 'selected'; }  ?> ><?php echo ucwords($country->country) ; ?></option>
                            <?php
                            }
                            ?>
                      </select>
               
                </div> 
            </div>
            </div>
            
        
            
            
            <?php /*?><div class="span12" style="width:25%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Area</label>
                                                    <div class="span8 controls arealist">   
                                                        <select name="area" id="area"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Area" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php 
                                                                
																if($this->uri->segment(8) !='' & $this->uri->segment(8) != '0' & $this->uri->segment(8) != 'All')
																{
																	
																$cid = $this->uri->segment(8);
																
																
																$all_area = $this->admin_model->get_locations($cid,'area');
                                                               
																	foreach ($all_area as $rrow) {
																	?>
																	<option value="<?php echo $rrow->id; ?>" <?php if($this->uri->segment(9) == $rrow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($rrow->location); ?></option>
																	<?php
																	
																	} 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div><?php */?>
            
            
            <div class="span12" style="width:25%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Users</label>
                                                    <div class="span8 controls userlist">   
                                                        <select name="users" id="users"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Area" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php                                                                
																	foreach ($salesmans as $srow) {
																	?>
																	<option value="<?php echo $srow->id; ?>" <?php if($this->uri->segment(3) == $srow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($srow->s_firstname).' '.ucwords($srow->s_lastname); ?></option>
																	<?php
																	}
																   
																	?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div>
            
            
            
            
            
                                   <div class="span12" style="width:25%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select District</label>
                                                    <div class="span8 controls districtlist">   
                                                        <select name="district" id="district"  class="nostyle selectbox2" style="width:100%;" placeholder="Select District" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php 
                                                                
																if($this->uri->segment(7) !='' & $this->uri->segment(7) != '0' & $this->uri->segment(7) != 'All')
																{
																	
																$cid = $this->uri->segment(7);
																
																
																$all_district = $this->admin_model->get_locations($cid,'district');
                                                               
																	foreach ($all_district as $rrow) {
																	?>
																	<option value="<?php echo $rrow->id; ?>" <?php if($this->uri->segment(8) == $rrow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($rrow->location); ?></option>
																	<?php
																	
																	} 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div> 
            
            
                        <div class="span12" style="width:25%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Zone</label>
                                                    <div class="span8 controls zonelist">   
                                                        <select name="zone" id="zone"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Zone" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                 <?php 
                                                                
																if($this->uri->segment(6) !='' & $this->uri->segment(6) != '0' & $this->uri->segment(6) != 'All')
																{
																	
																$cid = $this->uri->segment(6);
																
																
																$all_zones = $this->admin_model->get_location_lists2($cid);
                                                               
																	foreach ($all_zones as $rrow) {
																	?>
																	<option value="<?php echo $rrow->id; ?>" <?php if($this->uri->segment(7) == $rrow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($rrow->country); ?></option>
																	<?php
																	
																	} 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div>
            
            
            
<div class="form-row row-fluid" style="width:80%; float:right ;">
        
      				  <?php 
						if ($this->uri->segment(9) != '0') {
                           $vals = $this->uri->segment(9);
                           $typed = str_replace("-", "/", $vals);
						   
						   $splite_date = explode('to',$typed);					   
                          
                       } 
					    ?>
                                    
                                            <div class="span12">
                                            
                                            <div class="span4" style="width:auto;float: right;">

                                                    <button class="btn btn-primary" id="date_submit" >Submit</button>

                                                </div><!-- End .span4 -->
                                            
                                            <div class="row-fluid" style="float:right;width:350px;">
                                                    <label class="form-label span4" for="checkboxes">To Date &nbsp;&nbsp;&nbsp;</label>
                                                    <div class="span2" style="width:60%;" >
                                                        <input type="text" class="datepicker" placeholder="MM/DD/YYYY" name="t_date"  id="t_date"   value="<?php if(isset($splite_date[1]))
														{
														echo  $splite_date[1];
														
														} ?>" />
                                                    </div>
                                                </div>
                                                <div class="row-fluid" style="float:right;width:350px;">
                                                    <label class="form-label span4" for="checkboxes">From/Date</label>
                                                    <div class="span2" style="width:60%;" >
                                                        <input type="text" class="datepicker" placeholder="MM/DD/YYYY" name="a_date"  id="a_date"   value="<?php 
														if(isset($splite_date[0]))
														{
														echo  $splite_date[0];
														
														}
														 ?>" />
                                                    </div>
                                                </div>
                                                 
                                                

                                                

                                            </div>
                                   


                                        </div>
            
            
            
            

</div>
         
                
                  <a href="<?php echo base_url(); ?>catalog/viewdailyvisitreport/" class="btn btn-inverse"><span
                class="icon16 icomoon-icon-loop white"></span> View All</a><br><br>
                    
<?php

if($this->uri->segment(3) !='')
{
$seg3 = $this->uri->segment(3) ;	
}
else
{
$seg3 = '0';	
}


if($this->uri->segment(4) !='')
{
$seg4 = $this->uri->segment(4) ;	
}
else
{
$seg4 = '0';	
}


if($this->uri->segment(5) !='')
{
$seg5 = $this->uri->segment(5) ;	
}
else
{
$seg5 = '0';	
}

if($this->uri->segment(6) !='')
{
$seg6 = $this->uri->segment(6) ;	
}
else
{
$seg6 = '0';	
}

if($this->uri->segment(7) !='')
{
$seg7 = $this->uri->segment(7) ;	
}
else
{
$seg7 = '0';	
}

if($this->uri->segment(8) !='')
{
$seg8 = $this->uri->segment(8) ;	
}
else
{
$seg8 = '0';	
}

if($this->uri->segment(9) !='')
{
$seg9 = $this->uri->segment(9) ;	
}
else
{
$seg9 = '0';	
}

if($this->uri->segment(10) !='')
{
$seg10 = $this->uri->segment(10) ;	
}
else
{
$seg10 = '0';	
}

$back_url = $seg3.'~'.$seg4.'~'.$seg5.'~'.$seg6.'~'.$seg7.'~'.$seg8.'~'.$seg9.'~'.$seg10 ;

?>
                                        
                                                    
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box gradient">
                                <div class="title">
                                    <h4>
                                        <span>View Daily Visit Report</span>
                                        
                                    </h4>
                                </div>
                                <div class="content noPad clearfix">
                                
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>DATE</th>
                                              <th>REPORT</th>
                                              <th>SALESMAN</th>
                                              <th>USER DISTRICT</th>
                                                <th>USER ZONE</th>
                                                <th>USER STATE</th>
                                                <th>USER REGION</th>
                                                <th>USER COUNTRY</th>
                                                <th>DATE</th>
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
                                              <td><?php echo date('d-M-Y', strtotime($row->date)) ; ?></td>
                                              <td> <a href="<?php echo base_url(); ?>catalog/dayvisitreport/<?php echo $row->id.'/'.$back_url ; ?>" title="View Report" class="tip"><span class="icomoon-icon-enter-3"></span></a></td>
                                              <td><?php
												$user_details = $this->admin_model->GetByRow('meta', $row->userid, 'user_id');
												
												echo $user_details->s_firstname.' '.$user_details->s_lastname.' <br>(<span class="icon12 icomoon-icon-mobile"></span>'.$user_details->ur_phone.' )';
												
												 ?></td>
                                              <td><?php
												$district_details = $this->admin_model->GetByRow('tb_locations', $row->district, 'id');
												
												echo $district_details->location ;
												
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
                                                <td><?php echo date('d-M-Y h:i:s a', strtotime($row->datetime)) ; ?></td>
                                                
                                                <td class="center"><a href="#" title="Remove User Location" class="tip" onClick="linkRef('<?php echo base_url();?>catalog/deleteuserlocation/<?php echo $row->id.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5). '/' . $this->uri->segment(6).'/'.$this->uri->segment(7). '/' . $this->uri->segment(8).'/'.$this->uri->segment(9).'/'.$this->uri->segment(10) ;?>')"><span class="icon12 icomoon-icon-remove"></span></a></td>                 
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

$seg3 = $this->uri->segment(3);

}
else
{
$seg3 = 0;	
}


if($this->uri->segment(4) !='' & $this->uri->segment(4) != '0' & $this->uri->segment(4) != 'All')
{

$seg4 = $this->uri->segment(4);

}
else
{
$seg4 = 0;	
}


if($this->uri->segment(5) !='' & $this->uri->segment(5) != '0' & $this->uri->segment(5) != 'All')
{

$seg5 = $this->uri->segment(5);

}
else
{
$seg5 = 0;	
}



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


if($this->uri->segment(8) !='' & $this->uri->segment(8) != '0' & $this->uri->segment(8) != 'All')
{

$seg8 = $this->uri->segment(8);

}
else
{
$seg8 = 0;	
}


if($this->uri->segment(9) !='' & $this->uri->segment(9) != '0')
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
        $("#users").change(function () {
            var id = $(this).val();           
			
			window.location = '<?php echo base_url().'catalog/viewdailyvisitreport/' ; ?>'+id+'<?php echo '/'.$seg4.'/'.$seg5.'/'.$seg6.'/'.$seg7.'/'.$seg8.'/'.$seg9 ; ?>';


        });


        
    });
</script>



<script type="text/javascript">

    $(document).ready(function () {
        $("#country").change(function () {
            var id = $(this).val();
           
            window.location = '<?php echo base_url().'catalog/viewdailyvisitreport/'.$seg3.'/' ?>'+id+'<?php echo '/'.$seg5.'/'.$seg6.'/'.$seg7.'/'.$seg8.'/'.$seg9 ; ?>';


        });


        
    });
</script>

<script type="text/javascript">

    $(document).ready(function () {
        $("#region").change(function () {
            var id = $(this).val();
           
            window.location = '<?php echo base_url().'catalog/viewdailyvisitreport/'.$seg3.'/'.$seg4.'/' ?>'+id+'<?php echo '/'.$seg6.'/'.$seg7.'/'.$seg8.'/'.$seg9 ; ?>';


        });


        
    });
</script>




<script type="text/javascript">

    $(document).ready(function () {
		
        $("#state").change(function () {
            var id = $(this).val();


            window.location = '<?php echo base_url().'catalog/viewdailyvisitreport/'.$seg3.'/'.$seg4.'/'.$seg5.'/' ; ?>'+id+'<?php echo '/'.$seg7.'/'.$seg8.'/'.$seg9 ; ?>';


        });


        
    });
</script>



<script type="text/javascript">

    $(document).ready(function () {
        $("#zone").change(function () {
            var id = $(this).val();           
			
			window.location = '<?php echo base_url().'catalog/viewdailyvisitreport/'.$seg3.'/'.$seg4.'/'.$seg5.'/'.$seg6.'/' ; ?>'+id+'<?php echo '/'.$seg8.'/'.$seg9 ; ?>';


        });


        
    });
</script>


<script type="text/javascript">

    $(document).ready(function () {
        $("#district").change(function () {
            var id = $(this).val();           
			
			window.location = '<?php echo base_url().'catalog/viewdailyvisitreport/'.$seg3.'/'.$seg4.'/'.$seg5.'/'.$seg6.'/'.$seg7.'/' ; ?>'+id+'<?php echo '/'.$seg9 ; ?>';


        });


        
    });
</script>




<script type="application/javascript">

    $(document).ready(function () {


        $("#date_submit").click(function () {


            if ($("#a_date").val() != '') {
				

                  var name = $("#a_date").val();
				
                  var name = name.replace(/\//g," ");
				  
				  var name = name.replace(/\s/g,"-");
				  
				   //
					
					if ($("#t_date").val() != '') {
						
					
					var name2 = $("#t_date").val();                   

                    var name2 = name2.replace(/\//g," ");
				  
				    var name2 = name2.replace(/\s/g,"-");
					
					name = name+'to'+name2;
					
					}
					
					//
				  

                  window.location = '<?php echo base_url().'catalog/viewdailyvisitreport/'.$seg3.'/'.$seg4.'/'.$seg5.'/'.$seg6.'/'.$seg7.'/'.$seg8.'/' ; ?>'+name;
				  
            }

            else {

                $("#a_date").focus();

            }


        });


    });
</script>


<script type="application/javascript">

    $(document).ready(function () {


        $("#a_date").keyup(function (e) {

            if (e.which == 13) {


                if ($("#a_date").val() != '') {
					

                    var name = $("#a_date").val();                   

                    var name = name.replace(/\//g," ");
				  
				    var name = name.replace(/\s/g,"-");
					
					
					 //
					
					if ($("#t_date").val() != '') {
						
					
					var name2 = $("#t_date").val();                   

                    var name2 = name2.replace(/\//g," ");
				  
				    var name2 = name2.replace(/\s/g,"-");
					
					name = name+'to'+name2;
					
					}
					
					//
					

                   window.location = '<?php echo base_url().'catalog/viewdailyvisitreport/'.$seg3.'/'.$seg4.'/'.$seg5.'/'.$seg6.'/'.$seg7.'/'.$seg8.'/' ; ?>'+name;


                }

                else {

                    $("#a_date").focus();

                }

            }

        });


    });
</script>







