<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->
                <div class="heading">
                    <h3>Manage Daily Visit Report &nbsp;&nbsp; > &nbsp;&nbsp;<span style="color:#AF3600">Salesman : <?php echo ucwords($userdetails->s_firstname).' '.ucwords($userdetails->s_lastname) ;?></span></h3>  
                  
                </div><!-- End .heading-->
                
                <?php
				$back_url = $this->uri->segment(4);
				$back_url = str_replace('~','/',$back_url);
				?>
                
                <a href="<?php echo base_url().'catalog/viewdailyvisitreport/'.$back_url ; ?>" style="float:right; margin-top:1%;" class="btn btn-warning btn-mini">Back</a>
                
   <div class="form-row row-fluid" style="width:100%; float:right ;">  

            
            
            <div class="span12" style="width:25%; float:right; margin-top:15px;">
                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Area</label>
                                                    <div class="span8 controls arealist">   
                                                        <select name="area" id="area"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Area" required>                                                             
                                                               <option value="All" >--Select--</option>
                                                              
                                                               
                                                                	 <?php 
																
																	foreach ($userareas as $urow) {
																	?>
																	<option value="<?php echo $urow->id; ?>" <?php if($this->uri->segment(5) == $urow->id) {  echo 'selected'; }  ?> ><?php echo ucwords($urow->areaname); ?></option>
																	<?php
																	}
																   
																	?>
																
                                                          </select>
                                                   
                                                    </div> 
                                                </div>
            </div>
            
     <a href="<?php echo base_url(); ?>catalog/dayvisitreport/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4) ; ?>" class="btn btn-inverse"><span
                class="icon16 icomoon-icon-loop white"></span> View All</a><br><br>

</div>


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



$back_url = $seg3.'_'.$seg4.'_'.$seg5.'_'.$seg6 ;

?>
                                     
                                                    
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="box gradient">
                                <div class="title">
                                    <h4>
                                        <span>View Visited Centres</span>
                                      <span style="color:#AF3600; float:right;">Date : <?php echo date('d-M-Y', strtotime($daydata->date)) ; ?>&nbsp;&nbsp;&nbsp;</span>
                                        
                                    </h4>
                                </div>
                                <div class="content noPad clearfix">
                                
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                              <th>ID</th>
                                              <th>CENTRE</th>
                                              <th>SHOPS</th>
                                              <th>DATE</th>
                                              <th>SALESMAN</th>
                                              <th>AREA</th>
                                              <th> DISTRICT</th>
                                                <th> ZONE</th>
                                                <th> STATE</th>
                                                <th> REGION</th>
                                                <th> COUNTRY</th>
                                                <th>TIME ADDED</th>
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
                                              <td><?php
												$centre_details = $this->admin_model->GetByRow('tb_locations', $row->centreid, 'id');
												
												echo $centre_details->location ;
												
												 ?></td>
                                              <td><a href="<?php echo base_url(); ?>catalog/dayvisitlocationshops/<?php echo $row->id.'/'.$this->uri->segment(3).'/'.$back_url.'/yes'  ; ?>" title="View Shops" class="tip"><span class="icomoon-icon-enter-3"></span></a></td>
                                                 <td><?php echo date('d-M-Y', strtotime($row->date)) ; ?></td>
                                              <td><?php
												$user_details = $this->admin_model->GetByRow('meta', $row->userid, 'user_id');
												
												echo $user_details->s_firstname.' '.$user_details->s_lastname.' <br>(<span class="icon12 icomoon-icon-mobile"></span>'.$user_details->ur_phone.' )';
												
												 ?></td>
                                              <td><?php
												$area_details = $this->admin_model->GetByRow('tb_locations', $row->areaid, 'id');
												
												echo $area_details->location ;
												
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
                                                <td><?php echo date('h:i:s a', strtotime($row->datetime)) ; ?></td>
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


?>


<script type="text/javascript">

    $(document).ready(function () {
        $("#area").change(function () {
            var id = $(this).val();
           
            window.location = '<?php echo base_url().'catalog/dayvisitreport/'.$seg3.'/'.$seg4.'/' ?>'+id;


        });


        
    });
</script>


