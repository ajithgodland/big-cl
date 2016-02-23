
<div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Manage Shops</h3>                    

                    

                </div><!-- End .heading-->
    				
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

                    <div class="row-fluid">

                      <div class="span6" style="width:70%; margin-left:15%;">

                            <div class="box">

                                <div class="title">

                                    <h4> 
                                        <span>Editing Shop</span>
                                    </h4>
                                    
                                </div>
                                <div class="content">
                                   
                                    <form class="form-horizontal" action="<?php echo base_url().'catalog/editshop/'.$value->id.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6). '/' . $this->uri->segment(7). '/' . $this->uri->segment(8). '/' . $this->uri->segment(9). '/' . $this->uri->segment(10). '/' . $this->uri->segment(11). '/' . $this->uri->segment(12). '/' . $this->uri->segment(13) ; ?>" method="post" enctype="multipart/form-data" />
                                    
                                       <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                  <div class="error_messages">
                                              
                                           
                                           
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Name</label>
                                                    <input class="span8" id="name" type="text" name="name" value="<?php echo $value->name ; ?>" required />
                                                    <span class="error">
													<?php echo form_error('name');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                                                                
                                        
                                        
                                         <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Phone</label>
                                                    <input class="span8" id="phone" type="text" name="phone" value="<?php echo $value->phone ; ?>"  />
                                                    <span class="error">
													<?php echo form_error('phone');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                          <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Email</label>
                                                    <input class="span8" id="email" type="email" name="email" value="<?php echo $value->email ; ?>"  />
                                                    <span class="error">
													<?php echo form_error('email');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Country</label>
                                                    <div class="span8 controls countrylist">   
                                                        <select name="country" id="country"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Country" required>                                                             
                                                           <option value="" >--Select--</option>
                                                            <?php
                                                            foreach($countries as $country)
                                                            {
                                                            ?>
                                                            <option value="<?php echo $country->id ; ?>" <?php if(isset($_POST['country'])) { if($_POST['country'] == $country->id) {  echo 'selected'; } } else {  if($value->country == $country->id) {  echo 'selected'; }   }  ?> ><?php echo ucwords($country->country) ; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                               
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('country');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                        
                                        
                                         <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Region</label>
                                                    <div class="span8 controls regionlist">   
                                                        <select name="region" id="region"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Region" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['country'])) 
																{
																	$cid = $_POST['country'] ;
																}
																else
																{
																	$cid = $value->country ;
																}
																
																$all_regions = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_regions as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['region'])) { if($_POST['region'] == $rrow->id) {  echo 'selected'; } } else {  if($value->regionid == $rrow->id) {  echo 'selected'; }   } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
                                                                } 
																
																
																
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('region');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select State</label>
                                                    <div class="span8 controls statelist">   
                                                        <select name="state" id="state"  class="nostyle selectbox2" style="width:100%;" placeholder="Select State" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['region'])) 
																{
																	$cid = $_POST['region'] ;
																}
																else
																{
																	$cid = $value->regionid ;
																}
																
																$all_states = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_states as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['state'])) { if($_POST['state'] == $rrow->id) {  echo 'selected'; } } else {  if($value->state == $rrow->id) {  echo 'selected'; }   } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
                                                                } 
																
																
																
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('state');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                                                           
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Zone</label>
                                                    <div class="span8 controls zonelist">   
                                                        <select name="zone" id="zone"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Zone" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['state'])) 
																{
																	$cid = $_POST['state'] ;
																}
																else
																{
																	$cid = $value->state ;
																}
																
																$all_zones = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_zones as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['zone'])) { if($_POST['zone'] == $rrow->id) {  echo 'selected'; } } else {  if($value->zoneid == $rrow->id) {  echo 'selected'; }   } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
                                                                } 
																
																
																
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('zone');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select District</label>
                                                    <div class="span8 controls districtlist">   
                                                        <select name="district" id="district"  class="nostyle selectbox2" style="width:100%;" placeholder="Select District" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['zone'])) 
																{
																
																	$sid = $_POST['zone'] ;
																
																}
																
																else
																{
																	$sid = $value->zoneid;
                                                              
																}
																
																$all_districts = $this->admin_model->get_locations($sid,'district');
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_districts as $dis) {
                                                                    ?>
                                                                    <option value="<?php echo $dis->id; ?>" <?php if(isset($_POST['district'])) { if($_POST['district'] == $dis->id) {  echo 'selected'; } } else {  if($value->district == $dis->id) {  echo 'selected'; }   } ?>><?php echo ucwords($dis->location); ?></option>
                                                                <?php
                                                               
																}
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('district');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Area</label>
                                                    <div class="span8 controls arealist">   
                                                        <select name="area" id="area"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Area" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['district'])) 
																{
																	$cid = $_POST['district'] ;
																	
																}
																else
																{
																	$cid = $value->district ;
																}
																
																$all_areas = $this->admin_model->get_locations($cid,'area');
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_areas as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['area'])) { if($_POST['area'] == $rrow->id) {  echo 'selected'; } } else {  if($value->areaid 	 == $rrow->id) {  echo 'selected'; }   } ?>><?php echo ucwords($rrow->location); ?></option>
                                                                <?php
                                                               
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('area');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                                <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="checkboxes">Select Centre</label>
                                                    <div class="span8 controls centrelist">   
                                                        <select name="centre" id="centre"  class="nostyle selectbox2" style="width:100%;" placeholder="Select Centre" required>                                                             
                                                               <option value="" >--Select--</option>
                                                               <?php 
                                                                
																if(isset($_POST['area'])) 
																{
																	$cid = $_POST['area'] ;
																	
																}
																else
																{
																	$cid = $value->areaid ;
																}
																
																$all_areas = $this->admin_model->get_locations($cid,'centre');
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_areas as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['centre'])) { if($_POST['centre'] == $rrow->id) {  echo 'selected'; } } else {  if($value->centreid == $rrow->id) {  echo 'selected'; }   } ?>><?php echo ucwords($rrow->location); ?></option>
                                                                <?php
                                                               
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('area');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="textarea">Address</label>
                                                    <textarea class="span8 elastic" id="textarea1" rows="3"  name="address" required><?php echo $value->address ; ?></textarea>
                                                     <span class="error">
													<?php echo form_error('address');?>
                                                     </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <?php
										
										if($value->category_picture != '')
										{
										
										?>
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Current Shop Image</label>
                                                  <img src="<? echo base_url().'upload/category/'.$value->category_picture; ?>"   width="100" />  
                                                </div>
                                            </div>
                                        </div>


									<?php
										}
										?>
                              

                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="textarea">Shop Image</label>
                                                    <input type="file" id="file" name="cat_picture" />
                                                    
                                                </div>
                                            </div>  
                                        </div>
                                        
                                        

                                        
                                       <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">

                                                    <label class="form-label span4" for="checkboxes">Status</label>
                                                    
                                                    <div class="span8 controls">
                                                        
                                                        <div class="left marginT5">
                                                            <input type="radio" name="status" id="optionsRadios1" value="a" <?php
			if($value->status=='a')
			{
			echo 'checked'; }?> />
                                                            Active
                                                        </div>
                                                        <div class="left marginT5">
                                                            <input type="radio" name="status" id="optionsRadios2" value="d" <?php
			if($value->status=='d')
			{
			echo 'checked'; }?>  />
                                                           Deactive
                                                        </div>
                                                                                                                

                                                    </div>
                                                    
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                                                    <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Latitude</label>
                                                    <input class="span8" id="latitude" type="text" name="latitude"  value="<?php echo $value->latitude ; ?>"  />
                                                    <span class="error">
													<?php echo form_error('latitude');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                         <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Longitude</label>
                                                    <input class="span8" id="longitude" type="text" name="longitude"  value="<?php echo $value->longitude ; ?>"  />
                                                    <span class="error">
													<?php echo form_error('longitude');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">

                                                    <label class="form-label span4" for="checkboxes">Shop Location Verified</label>
                                                    
                                                    <div class="span8 controls">
                                                        
                                                        <div class="left marginT5">
                                                            <input type="radio" name="marked" id="optionsRadios1" value="yes" <?php
			if($value->marked == 'yes')
			{
			echo 'checked'; } ?> />
                                                           Yes
                                                        </div>
                                                        <div class="left marginT5">
                                                            <input type="radio" name="marked" id="optionsRadios2" value="no" <?php
			if($value->marked != 'yes')
			{
			echo 'checked'; } ?>  />
                                                           No
                                                        </div>
                                                                                                                

                                                    </div>
                                                    
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        
                                        
                                        <div class="title" style="margin-top:3%;">

                                    <h4> 
                                        <span>Contact Informations</span>
                                    </h4>
                                    
                                </div> 
                                
                                
                                 
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Contact Person Name</label>
                                                    <input class="span8" id="contactname" type="text" name="contactname" value="<?php echo $value->contactname ; ?>" required />
                                                    <span class="error">
													<?php echo form_error('contactname');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>  
                                        
                                        
                                          <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Contact Person Number</label>
                                                    <input class="span8" id="contactnumber" type="text" name="contactnumber" value="<?php echo $value->contactnumber ; ?>" required />
                                                    <span class="error">
													<?php echo form_error('contactnumber');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>  
                                        
                                        
                                        
                                           <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Tin No</label>
                                                    <input class="span8" id="tin" type="text" name="tin" value="<?php echo $value->tin ; ?>"  />
                                                    <span class="error">
													<?php echo form_error('tin');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>  
                                        
                                        
                                         <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Pin No</label>
                                                    <input class="span8" id="pin" type="text" name="pin" value="<?php echo $value->pin ; ?>"  />
                                                    <span class="error">
													<?php echo form_error('pin');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>  
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">CST</label>
                                                    <input class="span8" id="cst" type="text" name="cst" value="<?php echo $value->cst ; ?>"  />
                                                    <span class="error">
													<?php echo form_error('cst');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>  
                                        
                                        
                                         <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Whatsapp Number</label>
                                                    <input class="span8" id="whatsapp" type="text" name="whatsapp" value="<?php echo $value->whatsapp ; ?>"  />
                                                    <span class="error">
													<?php echo form_error('whatsapp');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>  
                                        
                                        
                                                                             
                                      
                                        
                                 <div class="title" style="margin-top:3%;">

                                    <h4> 
                                        <span>Other Informations</span><span style="float:right">(optional)&nbsp;&nbsp;&nbsp;</span>
                                    </h4>
                                    
                                </div>
                                
                     
                     				
                                    <script type="application/javascript"> 

			$(document).ready(function() {
				
				$( "#add_infom" ).click(function() {
					
					
				var rid = $( "#main_infom" ).attr('data-rid');
				
				rid = parseInt(rid);
				
				rid = rid+1 ;		
		
		      $( "#main_infom" ).attr('data-rid',rid);
			  
			  
					
					
				$( "#main_infom" ).append('<div class="file_box" id="fileid'+rid+'" style="margin-bottom:5px;margin-top:15px;"><textarea class="span8 elastic" id="label" rows="1" name="label[]" placeholder="Label" style="width:97%;"></textarea><textarea class="span8 elastic" id="text" rows="1" name="text[]" placeholder="Text" style="margin-top:5px;width:97%;"></textarea>&nbsp;&nbsp;<b style="cursor:pointer;"  onclick="remove_room('+rid+')">X</b></div>');
					
				});
				
			});
			
			
			
function remove_room(rid)
{
	
document.getElementById("fileid"+rid).remove();

	
}		
			
			
</script>


                                        
                                        <div class="form-row row-fluid">

                                            <div class="span12" id="main_infom" data-rid="0">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="textarea">More Informations </label>
                                                   
                                                   
                                                                                                         <?php 
						 
						 if($value->label != '')
						 {						
						 
						 
$label = $value->label;

$label = substr($label, 0, strlen($label)-1);

$label =  substr($label, 1);

$label=explode('+',$label);



$text = $value->text;

$text = substr($text, 0, strlen($text)-1);

$text = substr($text, 1);

$text=explode('+',$text);
						  
  						
						
					
						
					$qa=0;	  
					foreach($label as $lb)
					{
					
					?> 
                <div class="file_box" id="fileid<?php echo $qa+150; ?>" style="margin-bottom:5px;margin-top:15px;"><textarea class="span8 elastic" id="label" rows="1" name="label[]" placeholder="Label" style="width:97%;"><?php echo $lb ; ?></textarea><textarea class="span8 elastic" id="text" rows="1" name="text[]" placeholder="Text" style="width:97%; margin-top:1%;"><?php echo $text[$qa] ; ?></textarea><?php //if($qa > 0) { ?>&nbsp;&nbsp;<b style="cursor:pointer;"  onclick="remove_room(<?php echo $qa+150; ?>)">X</b><?php //} ?></div>
                                                  
                 <?php 
				 $qa++;
					} 
				}
				else
				{
				?>
                 
                  <textarea class="span8 elastic" id="label" rows="1" name="label[]" placeholder="Label"></textarea>
                  <textarea class="span8 elastic" id="text" rows="1" name="text[]" placeholder="Text" style="margin-left:32%; margin-top:1%;"></textarea>
                
                <?php
				}
				?>
     
                                                    
                                                </div>
                                                <span class="error"></span>
                                                 
                                            </div>  
                                            <div class="row-fluid">
                                                 <label class="form-label span4" for="textarea"></label>
                                                <a href="javascript:void(0)" class="btn btn-primary btn-mini" id="add_infom" style="float: right;margin-top: 1%;">Add Next</a>
                                                </div>                                           
                                        </div> 
                                        
                                       
                                 
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                   
                                                </div>
                                            </div>
                                        </div>
										
										<div class="form-actions">
                                           <button type="submit" class="btn btn-info">Submit</button>
                                          
                                        </div>
                                                                                

                                    </form>
                                 
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span6 --><!-- End .span6 --><!-- End .span6 -->
                       

                    </div><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid -->
               
    			
    				
              
                
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
	
	 $(document).ready(function(){	 
		
		
		$("#country").change(function()
		{
			
			$(".statelist").find('select').empty();
			
			$(".districtlist").find('select').empty();
			
			var country=$("#country").val();
				
			var dataString = 'country='+ country;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_state' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
					
						
				$(".statelist").find('select').empty().prepend(html);
				
				
				}
			});
			
		});	
		


		
		
});
</script>  



 <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#state").change(function()
		{
						
			$(".districtlist").find('select').empty();
			
			var state=$("#state").val();
				
			var dataString = 'state='+ state;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_districts' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
					
						
				$(".districtlist").find('select').empty().prepend(html);
				
				
				}
			});
			
		});	
		


		
		
});
</script>     


 <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#district").change(function()
		{
						
			$(".locationlist").find('select').empty();
			
			var district=$("#district").val();
				
			var dataString = 'district='+ district;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
					
						
				$(".locationlist").find('select').empty().prepend(html);
				
				
				}
			});
			
		});	
		


		
		
});
</script>     