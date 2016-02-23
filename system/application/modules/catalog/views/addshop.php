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
                                        <span>Add Shop</span>
                                    </h4>
                                    
                                </div>
                                <div class="content">
                                   
                                    <form class="form-horizontal" action="<?php echo base_url().'catalog/addshop/'.$this->uri->segment(3) ; ?>" method="post" enctype="multipart/form-data" />
                                    
                                       <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                  <div class="error_messages">
                                              
                                           
                                           
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                         
                                    <?php
									$userid = $this->uri->segment(3) ;	
									?>
                                    
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="normal">Name</label>
                                                    <input class="span8" id="name" type="text" name="name" value="<?php echo set_value('name') ; ?>" required />
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
                                                    <input class="span8" id="phone" type="text" name="phone" value="<?php echo set_value('phone') ; ?>"  />
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
                                                    <input class="span8" id="email" type="email" name="email" value="<?php echo set_value('email') ; ?>"  />
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
                                                                    <option value="<?php echo $country->id ; ?>" <?php if(isset($_POST['country'])) { if($_POST['country'] == $country->id) {  echo 'selected'; }  }  ?> ><?php echo ucwords($country->country) ; ?></option>
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
																
																$all_regions = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_regions as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['region'])) { if($_POST['region'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
                                                                } 
																
																
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
																
																$all_states = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_states as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['state'])) { if($_POST['state'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
                                                                } 
																
																
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
																
																$all_zones = $this->admin_model->get_location_lists2($cid);
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_zones as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['zone'])) { if($_POST['zone'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->country); ?></option>
                                                                <?php
                                                                } 
																
																
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
																	$cid = $_POST['zone'] ;
																
																$all_district = $this->admin_model->get_locations($cid,'district');
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_district as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['district'])) { if($_POST['district'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->location); ?></option>
                                                                <?php
                                                                } 
																
																
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
																
																$all_areas = $this->admin_model->get_locations($cid,'area');
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_areas as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['area'])) { if($_POST['area'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->location); ?></option>
                                                                <?php
                                                                } 
																
																
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
																
																$all_centre = $this->admin_model->get_locations($cid,'centre');
                                                                ?>
                                                               
                                                                <?php
                                                                foreach ($all_centre as $rrow) {
                                                                    ?>
                                                                    <option value="<?php echo $rrow->id; ?>" <?php if(isset($_POST['centre'])) { if($_POST['centre'] == $rrow->id) {  echo 'selected'; } } ?>><?php echo ucwords($rrow->location); ?></option>
                                                                <?php
                                                                } 
																
																
																}
                                                               
                                                                ?>
																
                                                          </select>
                                                    <span class="error">
													<?php echo form_error('centre');?>
                                                    </span>
                                                    </div> 
                                                </div>
                                            </div> 
                                        </div> 
                                        
                                        
                                       
                                        
                                        
                                        
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <label class="form-label span4" for="textarea">Address</label>
                                                    <textarea class="span8 elastic" id="textarea1" rows="3"  name="address" required><?php echo set_value('address') ; ?></textarea>
                                                     <span class="error">
													<?php echo form_error('address');?>
                                                     </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
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
                                                    <label class="form-label span4" for="normal">Latitude</label>
                                                    <input class="span8" id="latitude" type="text" name="latitude"  value="<?php echo set_value('latitude') ; ?>"  />
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
                                                    <input class="span8" id="longitude" type="text" name="longitude"  value="<?php echo set_value('longitude') ; ?>"  />
                                                    <span class="error">
													<?php echo form_error('longitude');?>
                                                    </span>
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
                                                    <input class="span8" id="contactname" type="text" name="contactname" value="<?php echo set_value('contactname') ; ?>" required />
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
                                                    <input class="span8" id="contactnumber" type="text" name="contactnumber" value="<?php echo set_value('contactnumber') ; ?>" required />
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
                                                    <input class="span8" id="tin" type="text" name="tin" value="<?php echo set_value('tin') ; ?>"  />
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
                                                    <input class="span8" id="pin" type="text" name="pin" value="<?php echo set_value('pin') ; ?>"  />
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
                                                    <input class="span8" id="cst" type="text" name="cst" value="<?php echo set_value('cst') ; ?>"  />
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
                                                    <input class="span8" id="whatsapp" type="text" name="whatsapp" value="<?php echo set_value('whatsapp') ; ?>"  />
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
                                                   <textarea class="span8 elastic" id="label" rows="1" name="label[]" placeholder="Label"></textarea>
                                                   <textarea class="span8 elastic" id="text" rows="1" name="text[]" placeholder="Text" style="margin-left:32%; margin-top:1%;"></textarea>
     
                                                    
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
			
			$(".regionlist").find('select').empty();
			
			var country=$("#country").val();
				
			var dataString = 'location='+ country;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_country_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
						
				$(".regionlist").find('select').empty().prepend(html);
				
				}
			});
			
		});	
		


		
		
});
</script>  


  <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#region").change(function()
		{
			
			$(".statelist").find('select').empty();
			
			var region=$("#region").val();
				
			var dataString = 'location='+ region;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_country_locations' ?>",
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
			
			$(".zonelist").find('select').empty();
			
			var state=$("#state").val();
				
			var dataString = 'location='+ state;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_country_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
						
				$(".zonelist").find('select').empty().prepend(html);
				
				}
			});
			
		});	
		


		
		
});
</script>  



 <script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#zone").change(function()
		{
			
			$(".districtlist").find('select').empty();
			
			var zone=$("#zone").val();
			
			var type = 'district';
				
			var dataString = 'location='+ zone + "&type=" + type;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_locations' ?>",
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
			
			$(".arealist").find('select').empty();
			
			var district=$("#district").val();
			
			var type = 'area';
				
			var dataString = 'location='+ district + "&type=" + type;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
						
				$(".arealist").find('select').empty().prepend(html);
				
				}
			});
			
		});	
		


		
		
});
</script> 


<script type="text/javascript">	
	
	 $(document).ready(function(){	 
		
		
		$("#area").change(function()
		{
			
			$(".centrelist").find('select').empty();
			
			var area=$("#area").val();
			
			var type = 'centre';
				
			var dataString = 'location='+ area + "&type=" + type;
			$.ajax
			({
				type: "POST",
				url: "<?php echo base_url().'catalog/get_locations' ?>",
				data: dataString,
				cache: false,
				success: function(html)
				{
						
				$(".centrelist").find('select').empty().prepend(html);
				
				}
			});
			
		});	
		


		
		
});
</script> 